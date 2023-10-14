<?php

namespace App\Http\Requests\Authorized\Settings\Password;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UpdateRequest extends FormRequest
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
            'current_password' => __('Текущий пароль'),
            'password' => __('Новый пароль'),
            'password_confirmation' => __('Подтвердите новый пароль'),
        ];
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'current_password' => [
                'required', 'current_password'
            ],
            'password' => [
                'required', Password::defaults(), 'confirmed'
            ],
        ];
    }
}
