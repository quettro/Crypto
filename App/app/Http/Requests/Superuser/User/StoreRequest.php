<?php

namespace App\Http\Requests\Superuser\User;

use App\Enums\User\StatusEnum;
use App\Enums\User\SuperuserEnum;
use App\Models\Ip;
use App\Models\User;
use App\Models\UserAgent;
use BenSampo\Enum\Rules\EnumValue;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;

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
            'name' => [
                'required', 'string', 'max:255', 'alpha_dash:ascii', 'unique:' . User::class
            ],
            'email' => [
                'required', 'string', 'email', 'max:255', 'unique:' . User::class
            ],
            'email_verified_at' => [
                'nullable', 'date_format:Y-m-d H:i:s'
            ],
            'password' => [
                'required', Rules\Password::defaults()
            ],
            'remember_token' => [
                'nullable', 'string', 'max:100'
            ],
            'balance' => [
                'required', 'decimal:0,8', 'min:0', 'max:99999999'
            ],
            'status' => [
                'required', 'integer', new EnumValue(StatusEnum::class, false)
            ],
            'superuser' => [
                'required', 'integer', new EnumValue(SuperuserEnum::class, false)
            ],
            'ip_id' => [
                'required', 'integer', Rule::exists(Ip::class, 'id')
            ],
            'user_agent_id' => [
                'required', 'integer', Rule::exists(UserAgent::class, 'id')
            ],
            'referer' => [
                'nullable', 'string', 'max:65535'
            ],
        ];
    }
}
