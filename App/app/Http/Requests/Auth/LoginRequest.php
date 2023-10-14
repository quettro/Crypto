<?php

namespace App\Http\Requests\Auth;

use App\Enums\Authorization\CodeEnum;
use App\Enums\User\StatusEnum;
use App\Models\Ip;
use App\Models\UserAgent;
use App\Rules\HCaptcha;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return string
     */
    public function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->input('email')));
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            'h-captcha-response.required' => __('Капча неверна или срок ее действия истек. Пожалуйста, попробуйте снова.'),
        ];
    }

    /**
     * @return string[]
     */
    public function attributes(): array
    {
        return [
            'email' => __('Адрес электронной почты'),
            'password' => __('Пароль'),
            'h-captcha-response' => __('HCaptcha'),
        ];
    }

    /**
     * @return array[]
     */
    public function rules(): array
    {
        return [
            'email' => [
                'required', 'string', 'email'
            ],
            'password' => [
                'required', 'string'
            ],
            'h-captcha-response' => [
                'required', 'string', new HCaptcha(setting()->hcaptcha_public, setting()->hcaptcha_secret), 'exclude'
            ],
        ];
    }

    /**
     * @return void
     * @throws ValidationException
     */
    public function authenticate(): void
    {
        $this->ensureIsNotRateLimited();

        $credentials = $this->only(['email', 'password']);
        $credentials['status'] = StatusEnum::ACTIVE;

        if (!Auth::attempt($credentials, $this->boolean('remember'))) {
            $user = \App\Models\User::whereEmail($credentials['email'])->first();

            if ($user !== NULL) {
                $attributes = [];
                $attributes['code'] = CodeEnum::_400;
                $attributes['ip_id'] = Ip::current()->id;
                $attributes['user_agent_id'] = UserAgent::current()->id;

                $authorization = $user->authorizationHasMany()->make($attributes);
                $authorization->save();
            }

            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'email' => trans('auth.failed')]);
        }

        RateLimiter::clear($this->throttleKey());
    }

    /**
     * @return void
     * @throws ValidationException
     */
    public function ensureIsNotRateLimited(): void
    {
        if (!RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }
}
