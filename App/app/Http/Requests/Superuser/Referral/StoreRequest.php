<?php

namespace App\Http\Requests\Superuser\Referral;

use App\Models\User;
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
            'referrer_id' => [
                'required', 'integer', Rule::exists(User::class, 'id')
            ],
            'referral_id' => [
                'required', 'integer', Rule::exists(User::class, 'id')
            ],
        ];
    }
}
