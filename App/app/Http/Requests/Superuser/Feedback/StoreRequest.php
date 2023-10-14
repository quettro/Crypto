<?php

namespace App\Http\Requests\Superuser\Feedback;

use App\Enums\Feedback\TopicEnum;
use App\Models\Ip;
use App\Models\User;
use App\Models\UserAgent;
use BenSampo\Enum\Rules\EnumValue;
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
            'topic' => [
                'required', 'integer', new EnumValue(TopicEnum::class, false)
            ],
            'message' => [
                'required', 'string', 'max:65535'
            ],
            'ip_id' => [
                'required', 'integer', Rule::exists(Ip::class, 'id')
            ],
            'user_agent_id' => [
                'required', 'integer', Rule::exists(UserAgent::class, 'id')
            ],
            'user_id' => [
                'required', 'integer', Rule::exists(User::class, 'id')
            ],
        ];
    }
}
