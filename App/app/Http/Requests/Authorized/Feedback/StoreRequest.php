<?php

namespace App\Http\Requests\Authorized\Feedback;

use App\Enums\Feedback\TopicEnum;
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
     * @return string[]
     */
    public function attributes(): array
    {
        return [
            'topic' => __('Тема'),
            'message' => __('Сообщение'),
        ];
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
        ];
    }
}
