<?php

namespace App\Http\Requests\Superuser\Achievement;

use App\Enums\Achievement\StatusEnum;
use App\Enums\Achievement\TypeEnum;
use BenSampo\Enum\Rules\EnumValue;
use Illuminate\Foundation\Http\FormRequest;

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
            'description' => [
                'required', 'string', 'max:255'
            ],
            'purpose' => [
                'required', 'integer', 'min:1', 'max:2147483647'
            ],
            'tether' => [
                'required', 'decimal:0,8', 'min:0', 'max:99999999'
            ],
            'status' => [
                'required', 'integer', new EnumValue(StatusEnum::class, false)
            ],
        ];
    }
}
