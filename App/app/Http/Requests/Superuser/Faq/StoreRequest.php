<?php

namespace App\Http\Requests\Superuser\Faq;

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
            'q' => [
                'required', 'string', 'max:65535'
            ],
            'a' => [
                'required', 'string', 'max:65535'
            ],
        ];
    }
}
