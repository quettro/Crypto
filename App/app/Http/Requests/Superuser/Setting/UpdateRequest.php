<?php

namespace App\Http\Requests\Superuser\Setting;

use Illuminate\Foundation\Http\FormRequest;

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
            'contact' => [
                'required', 'string', 'max:255'
            ],
            'hcaptcha_public' => [
                'required', 'string', 'max:255'
            ],
            'hcaptcha_secret' => [
                'required', 'string', 'max:255'
            ],
            'referral_program_parameter' => [
                'required', 'string', 'max:255'
            ],
            'referral_program_commission_percentage' => [
                'required', 'integer', 'min:0', 'max:100'
            ],
            'freebie_tether' => [
                'required', 'decimal:0,8', 'min:0', 'max:99999999'
            ],
            'freebie_timeout' => [
                'required', 'integer', 'min:0', 'max:2147483647'
            ],
            'freebie_limit_per_day' => [
                'required', 'integer', 'min:0', 'max:2147483647'
            ],
        ];
    }
}
