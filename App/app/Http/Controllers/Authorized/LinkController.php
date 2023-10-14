<?php

namespace App\Http\Controllers\Authorized;

use App\Enums\Achievement\StatusEnum as AchievementStatusEnum;
use App\Enums\Achievement\TypeEnum as AchievementTypeEnum;
use App\Enums\Link\StatusEnum as LinkStatusEnum;
use App\Enums\LinkPtc\StatusEnum as LinkPtcStatusEnum;
use App\Enums\Transaction\SourceEnum as TransactionSourceEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Authorized\Link\VisitRequest;
use App\Models\Ip;
use App\Models\Link;
use App\Models\LinkPtc;
use App\Models\UserAgent;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Throwable;

class LinkController extends Controller
{
    /**
     * @return Factory|View|Application
     */
    public function index(): Factory|View|Application
    {
        $collection = Link::query()->where('status', LinkStatusEnum::Y);

        $collection->withCount([
            'linkHasMany as for_the_current_day' => fn ($query) =>
                $query
                    ->where('user_id', Auth::user()->id)->where('created_at', '>=', Carbon::today())
        ]);

        $collection = $collection->get();

        return view('main.Authorized.Link.index')
            ->with('collection', $collection);
    }

    /**
     * @param VisitRequest $request
     * @param Link $link
     * @return Application|RedirectResponse|Redirector
     */
    public function visit(VisitRequest $request, Link $link): Redirector|RedirectResponse|Application
    {
        /* @var $ptc LinkPtc */

        $attributes = [];
        $attributes['ip_id'] = Ip::current()->id;
        $attributes['user_agent_id'] = UserAgent::current()->id;
        $attributes['user_id'] = $request->user()->id;

        $ptc = $link->linkHasMany()->make($attributes);
        $ptc->save();

        $r = route('link.verification', [$ptc->link_id, $ptc->uniqid]);

        if (app()->isLocal()) {
            return redirect($r);
        }
        else {
            try {
                return redirect($link->createLinkViaApi($r));
            }
            catch (Throwable) {
                $ptc->delete();

                return to_route('link.index')
                    ->with('notification::error', __('Упс... Не удалось получить ссылку. Повторите попытку позже.'));
            }
        }
    }

    /**
     * @param Request $request
     * @param Link $link
     * @param string $uniqid
     * @return RedirectResponse
     */
    public function verification(Request $request, Link $link, string $uniqid): RedirectResponse
    {
        $w = ['uniqid' => $uniqid, 'status' => LinkPtcStatusEnum::N, 'link_id' => $link->id, 'user_id' => $request->user()->id];

        $ptc = LinkPtc::query()->where($w)->firstOrFail();
        $ptc->status = LinkPtcStatusEnum::Y;
        $ptc->save();

        $user = $request->user();
        $user->topUpBalance($link->tether, new TransactionSourceEnum(TransactionSourceEnum::L));

        $user->increaseProgress(
            $user
                ->achievementHasMany()
                ->with('achievement')
                ->whereNull('completed_at')
                ->whereRelation('achievement', 'type', AchievementTypeEnum::L)
                ->whereRelation('achievement', 'status', AchievementStatusEnum::Y)
                ->getQuery()
        );

        return to_route('link.index')
            ->with('notification::success', __('Еее. Ваш баланс пополнен на :tether USDT.', ['tether' => str($link->tether)->toTether()]));
    }
}
