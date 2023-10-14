<?php

namespace App\Http\Requests\Superuser\UserAchievement;

use App\Models\Achievement;
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
            'progress' => [
                'required', 'integer', 'min:0', 'max:2147483647'
            ],
            'completed_at' => [
                'nullable', 'date_format:Y-m-d H:i:s'
            ],
            'user_id' => [
                'required', 'integer', Rule::exists(User::class, 'id')
            ],
            'achievement_id' => [
                'required', 'integer', Rule::exists(Achievement::class, 'id')
            ],
        ];
    }
}
