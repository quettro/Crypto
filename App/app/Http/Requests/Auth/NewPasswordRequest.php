<?php

namespace App\Http\Requests\Auth;

use App\Rules\HCaptcha;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class NewPasswordRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return string[]
     */
    public function attributes(): array
    {
        return [
            'token' => __('Токен'),
            'email' => __('Адрес электронной почты'),
            'password' => __('Пароль'),
            'password_confirmation' => __('Повторный пароль'),
            'h-captcha-response' => __('HCaptcha'),
        ];
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
     * @return array
     */
    public function rules(): array
    {
        return [
            'token' => [
                'required'
            ],
            'email' => [
                'required', 'email'
            ],
            'password' => [
                'required', 'confirmed', Rules\Password::defaults()
            ],
            'h-captcha-response' => [
                'required', 'string', new HCaptcha(setting()->hcaptcha_public, setting()->hcaptcha_secret), 'exclude'
            ],
        ];
    }
}
