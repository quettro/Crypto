<?php

namespace App\Http\Requests\Authorized\Freebie;

use App\Rules\HCaptcha;
use Carbon\CarbonInterface;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

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
            'h-captcha-response' => __('HCaptcha'),
        ];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            'h-captcha-response.required' => __('Капча неверна или срок ее действия истек. Пожалуйста, попробуйте снова.'),
        ];
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'h-captcha-response' => [
                'required', 'string', new HCaptcha(setting()->hcaptcha_public, setting()->hcaptcha_secret), 'exclude'
            ],
        ];
    }

    /**
     * @return void
     * @throws ValidationException
     */
    public function makeSureThereAreNoRestrictions(): void
    {
        $freebieC = $this->user()->transactionHasMany()->onlyTheAddType()->onlyTheFSource()->forTheCurrentDayOrMore()->count();
        $freebieL = $this->user()->transactionHasMany()->onlyTheAddType()->onlyTheFSource()->orderByDesc('created_at')->first();

        if ($freebieC >= setting()->freebie_limit_per_day) {
            throw ValidationException::withMessages([
                'error' => __('Достигнут ежедневный лимит запросов. Повторите попытку завтра.'),
            ]);
        }

        if ($freebieL) {
            $freebieN = $freebieL->created_at->addMinutes(setting()->freebie_timeout);

            if ($freebieN > now()) {
                throw ValidationException::withMessages([
                    'error' => __('Упс... Не так быстро. Повторите попытку :diff.', [
                        'diff' => $freebieN->diffForHumans(now(), CarbonInterface::DIFF_RELATIVE_TO_NOW),
                    ]),
                ]);
            }
        }
    }
}
