<?php

namespace App\Http\Controllers\Authorized\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Authorized\Settings\Password\UpdateRequest;
use App\Notifications\Authorized\Settings\PasswordUpdateNotification;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    /**
     * @param UpdateRequest $request
     * @return RedirectResponse
     */
    public function update(UpdateRequest $request): RedirectResponse
    {
        $attributes = [];
        $attributes['password'] = Hash::make($request->validated('password'));

        $request->user()->update($attributes);
        $request->user()->makeActivity('Изменен пароль от аккаунта через личный кабинет.');
        $request->user()->notify(new PasswordUpdateNotification());

        return to_route('settings.index')
            ->with('settings.password.success', __('Вы успешно изменили пароль от своего аккаунта.'));
    }
}
