<?php

namespace App\Rules;

use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Translation\Translator;
use Illuminate\Contracts\Validation\Rule;

class HCaptcha implements Rule
{
    /**
     * @param mixed $_public
     * @param mixed $_secret
     */
    public function __construct(private mixed $_public, private mixed $_secret)
    {
    }

    /**
     * @return array|Application|Translator|string|null
     */
    public function message(): array|string|Translator|Application|null
    {
        return __('Капча неверна или срок ее действия истек. Пожалуйста, попробуйте снова.');
    }

    /**
     * @param $attribute
     * @param $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        try {
            $response = (new \App\Classes\HCaptcha($this->_public, $this->_secret))->verify($value);
        }
        catch (Exception) {
            $response = ['success' => false];
        }

        try {
            return (bool) $response['success'];
        }
        catch (Exception) {
            return false;
        }
    }
}
