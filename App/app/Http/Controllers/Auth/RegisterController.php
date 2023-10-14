<?php

namespace App\Http\Controllers\Auth;

use App\Enums\User\StatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\Ip;
use App\Models\Referral;
use App\Models\User;
use App\Models\UserAgent;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('main.Auth.register');
    }

    /**
     * @param RegisterRequest $request
     * @return RedirectResponse
     */
    public function store(RegisterRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $validated['status'] = StatusEnum::ACTIVE;
        $validated['password'] = Hash::make($validated['password']);
        $validated['last_activity_at'] = now();
        $validated['referer'] = $request->session()->get('referer');
        $validated['ip_id'] = Ip::current()->id;
        $validated['user_agent_id'] = UserAgent::current()->id;

        $user = new User($validated);
        $user->save();
        $user->makeActivity('Успешно завершена процедура регистрации аккаунта.');

        event(new Registered($user));

        if ($request->session()->has('referral')) {
            $referrer = User::whereName($request->session()->get('referral'))->first();

            if ($referrer !== NULL) {
                $referral = new Referral();
                $referral->referrer_id = $referrer->id;
                $referral->referral_id = $user->id;
                $referral->save();

                $referral->referrer->makeActivity('Успешно создана новая реферальная связь.', ['id' => $referral->id]);
                $referral->referral->makeActivity('Успешно создана новая реферальная связь.', ['id' => $referral->id]);
            }
        }

        return to_route('login')
            ->with('RegisterController.status', 'success');
    }
}
