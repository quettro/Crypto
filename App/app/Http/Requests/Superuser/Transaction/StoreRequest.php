<?php

namespace App\Http\Requests\Superuser\Transaction;

use App\Enums\Transaction\SourceEnum;
use App\Enums\Transaction\TypeEnum;
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
            'type' => [
                'required', 'integer', new EnumValue(TypeEnum::class, false)
            ],
            'source' => [
                'required', 'integer', new EnumValue(SourceEnum::class, false)
            ],
            'tether' => [
                'required', 'decimal:0,8', 'min:0', 'max:99999999'
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
