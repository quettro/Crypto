<?php

namespace App\Http\Controllers\Authorized;

use App\Http\Controllers\Controller;
use App\Http\Requests\Authorized\Feedback\StoreRequest;
use App\Models\Faq;
use App\Models\Feedback;
use App\Models\Ip;
use App\Models\UserAgent;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class SupportController extends Controller
{
    /**
     * @return Factory|View|Application
     */
    public function index(): Factory|View|Application
    {
        return view('main.Authorized.Support.index')
            ->with('collection', Faq::query()->get());
    }

    /**
     * @param StoreRequest $request
     * @return RedirectResponse
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $validated['ip_id'] = Ip::current()->id;
        $validated['user_agent_id'] = UserAgent::current()->id;
        $validated['user_id'] = $request->user()->id;

        $feedback = new Feedback($validated);
        $feedback->save();

        $request->user()->makeActivity('Отправлено сообщение в службу поддержки.', ['id' => $feedback->id]);

        return to_route('support.index')
            ->with('support.success', __('Спасибо за ваше сообщение! Мы рассмотрим его как можно скорее и ответим вам при необходимости.'));
    }
}
