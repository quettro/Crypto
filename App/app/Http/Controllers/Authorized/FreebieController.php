<?php

namespace App\Http\Controllers\Authorized;

use App\Enums\Achievement\StatusEnum as AchievementStatusEnum;
use App\Enums\Achievement\TypeEnum as AchievementTypeEnum;
use App\Enums\Transaction\SourceEnum as TransactionSourceEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Authorized\Freebie\StoreRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;

class FreebieController extends Controller
{
    /**
     * @return Factory|View|Application
     */
    public function index(): Factory|View|Application
    {
        return view('main.Authorized.Freebie.index');
    }

    /**
     * @param StoreRequest $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $request->makeSureThereAreNoRestrictions();

        $user = $request->user();
        $user->topUpBalance(setting()->freebie_tether, new TransactionSourceEnum(TransactionSourceEnum::F));

        $user->increaseProgress(
            $user
                ->achievementHasMany()
                ->with('achievement')
                ->whereNull('completed_at')
                ->whereRelation('achievement', 'type', AchievementTypeEnum::F)
                ->whereRelation('achievement', 'status', AchievementStatusEnum::Y)
                ->getQuery()
        );

        return to_route('freebie.index')
            ->with('success', __('Еее. Ваш баланс пополнен на :tether USDT.', ['tether' => str(setting()->freebie_tether)->toTether()]));
    }
}
