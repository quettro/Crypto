<?php

namespace App\Http\Requests\Superuser\LinkPtc;

use App\Enums\LinkPtc\StatusEnum;
use App\Models\Ip;
use App\Models\Link;
use App\Models\LinkPtc;
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
            'uniqid' => [
                'required', 'string', 'max:255', Rule::unique(LinkPtc::class)
            ],
            'status' => [
                'required', 'integer', new EnumValue(StatusEnum::class, false)
            ],
            'link_id' => [
                'required', 'integer', Rule::exists(Link::class, 'id')
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
