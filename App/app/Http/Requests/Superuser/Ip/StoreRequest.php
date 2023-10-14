<?php

namespace App\Http\Requests\Superuser\Ip;

use App\Models\Ip;
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
            'ip' => [
                'nullable', 'string', 'max:255', Rule::unique(Ip::class)
            ],
            'city' => [
                'nullable', 'string', 'max:255'
            ],
            'region' => [
                'nullable', 'string', 'max:255'
            ],
            'region_code' => [
                'nullable', 'string', 'max:255'
            ],
            'region_name' => [
                'nullable', 'string', 'max:255'
            ],
            'country_code' => [
                'nullable', 'string', 'max:255'
            ],
            'country_name' => [
                'nullable', 'string', 'max:255'
            ],
            'continent_code' => [
                'nullable', 'string', 'max:255'
            ],
            'continent_name' => [
                'nullable', 'string', 'max:255'
            ],
            'timezone' => [
                'nullable', 'string', 'max:255'
            ],
        ];
    }
}
