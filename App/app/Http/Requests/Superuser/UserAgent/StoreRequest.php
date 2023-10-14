<?php

namespace App\Http\Requests\Superuser\UserAgent;

use App\Models\UserAgent;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'user_agent' => [
                'nullable', 'string', 'max:255', Rule::unique(UserAgent::class)
            ],
            'ua' => [
                'nullable', 'string', 'max:255'
            ],
            'ua_major' => [
                'nullable', 'string', 'max:255'
            ],
            'ua_minor' => [
                'nullable', 'string', 'max:255'
            ],
            'ua_patch' => [
                'nullable', 'string', 'max:255'
            ],
            'os' => [
                'nullable', 'string', 'max:255'
            ],
            'os_major' => [
                'nullable', 'string', 'max:255'
            ],
            'os_minor' => [
                'nullable', 'string', 'max:255'
            ],
            'os_patch' => [
                'nullable', 'string', 'max:255'
            ],
            'device' => [
                'nullable', 'string', 'max:255'
            ],
            'device_brand' => [
                'nullable', 'string', 'max:255'
            ],
            'device_model' => [
                'nullable', 'string', 'max:255'
            ],
        ];
    }
}
