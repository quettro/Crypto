<?php

namespace App\Http\Controllers\Auth;

use App\Enums\Authorization\CodeEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Ip;
use App\Models\UserAgent;
use App\Notifications\Auth\LoginNotification;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('main.Auth.login');
    }

    /**
     * @param LoginRequest $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $request->session()->regenerate();

        $attributes = [];
        $attributes['code'] = CodeEnum::_200;
        $attributes['ip_id'] = Ip::current()->id;
        $attributes['user_agent_id'] = UserAgent::current()->id;

        $authorization = $request->user()->authorizationHasMany()->make($attributes);
        $authorization->save();

        $request->user()->makeActivity('Выполнен вход в аккаунт.');
        $request->user()->notify(new LoginNotification());

        if ($request->user()->ip_id === null)
            $request->user()->update(['ip_id' => $authorization->ip_id]);

        if ($request->user()->user_agent_id === null)
            $request->user()->update(['user_agent_id' => $authorization->user_agent_id]);

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function destroy(Request $request): Redirector|RedirectResponse|Application
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
