<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Stephenjude\DefaultModelSorting\Traits\DefaultOrderBy;

/**
 * App\Models\Setting
 *
 * @property int $id
 * @property string $contact
 * @property string $hcaptcha_public
 * @property string $hcaptcha_secret
 * @property string $referral_program_parameter
 * @property int $referral_program_commission_percentage
 * @property string $freebie_tether
 * @property int $freebie_timeout
 * @property int $freebie_limit_per_day
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting query()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereContact($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereFreebieLimitPerDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereFreebieTether($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereFreebieTimeout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereHcaptchaPublic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereHcaptchaSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereReferralProgramCommissionPercentage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereReferralProgramParameter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Setting extends Model
{
    /**
     *
     */
    use DefaultOrderBy;

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @var Model|null
     */
    protected static Model|null $cached = null;

    /**
     * @var string
     */
    protected static string $orderByColumn = 'id';

    /**
     * @var string
     */
    protected static string $orderByColumnDirection = 'desc';

    /**
     * @return Setting|Setting[]|\Illuminate\Database\Eloquent\Collection|Model|null
     */
    public static function default(): Model|\Illuminate\Database\Eloquent\Collection|Setting|array|null
    {
        if (self::$cached === null) {
            self::$cached = self::query()->where('id', 1)->first();
        }
        return self::$cached;
    }
}
