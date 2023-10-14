<?php

namespace App\Http\Requests\Superuser\Link;

use App\Enums\Link\StatusEnum;
use App\Models\Link;
use BenSampo\Enum\Rules\EnumValue;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required', 'string', 'max:255', Rule::unique(Link::class)->ignore($this->route('link'))
            ],
            'route' => [
                'required', 'string', 'max:255', Rule::unique(Link::class)->ignore($this->route('link'))
            ],
            'tether' => [
                'required', 'decimal:0,8', 'min:0', 'max:99999999'
            ],
            'limit_per_day' => [
                'required', 'integer', 'min:0', 'max:2147483647'
            ],
            'status' => [
                'required', 'integer', new EnumValue(StatusEnum::class, false)
            ],
        ];
    }
}
