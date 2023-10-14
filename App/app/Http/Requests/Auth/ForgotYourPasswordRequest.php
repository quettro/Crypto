<?php

namespace App\Http\Requests\Auth;

use App\Rules\HCaptcha;
use Illuminate\Foundation\Http\FormRequest;

class ForgotYourPasswordRequest extends FormRequest
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
            'email' => __('Адрес электронной почты'),
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
            'email' => [
                'required', 'email'
            ],
            'h-captcha-response' => [
                'required', 'string', new HCaptcha(setting()->hcaptcha_public, setting()->hcaptcha_secret), 'exclude'
            ],
        ];
    }
}
