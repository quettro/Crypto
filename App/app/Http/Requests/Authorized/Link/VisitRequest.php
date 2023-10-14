<?php

namespace App\Http\Requests\Authorized\Link;

use App\Enums\Link\StatusEnum;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class VisitRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        $link = $this->route('link');

        $forTheCurrentDay = $link->linkHasMany()
            ->where('user_id', $this->user()->id)->where('created_at', '>=', Carbon::today())->count();

        return $link->status->is(StatusEnum::Y) && $link->limit_per_day > $forTheCurrentDay;
    }
}
