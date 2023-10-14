<?php

namespace App\Models;

use App\Jobs\UpdateTheIpAddressLocation;
use Illuminate\Database\Eloquent\Model;
use Stephenjude\DefaultModelSorting\Traits\DefaultOrderBy;

/**
 * App\Models\Ip
 *
 * @property int $id
 * @property string|null $ip
 * @property string|null $city
 * @property string|null $region
 * @property string|null $region_code
 * @property string|null $region_name
 * @property string|null $country_code
 * @property string|null $country_name
 * @property string|null $continent_code
 * @property string|null $continent_name
 * @property string|null $timezone
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Ip newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ip newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ip query()
 * @method static \Illuminate\Database\Eloquent\Builder|Ip whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ip whereContinentCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ip whereContinentName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ip whereCountryCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ip whereCountryName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ip whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ip whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ip whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ip whereRegion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ip whereRegionCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ip whereRegionName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ip whereTimezone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ip whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Ip extends Model
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
     * @var string
     */
    protected static string $orderByColumn = 'id';

    /**
     * @var string
     */
    protected static string $orderByColumnDirection = 'desc';

    /**
     * @return Ip
     */
    public static function current(): Ip
    {
        return Ip::whereIp(request()->ip())->firstOr(
            function () {
                UpdateTheIpAddressLocation::dispatch($ip = Ip::create(['ip' => request()->ip()]));

                return $ip;
            }
        );
    }
}
