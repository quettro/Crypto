<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Stephenjude\DefaultModelSorting\Traits\DefaultOrderBy;
use Throwable;
use UAParser\Parser;

/**
 * App\Models\UserAgent
 *
 * @property int $id
 * @property string|null $user_agent
 * @property string|null $ua
 * @property string|null $ua_major
 * @property string|null $ua_minor
 * @property string|null $ua_patch
 * @property string|null $os
 * @property string|null $os_major
 * @property string|null $os_minor
 * @property string|null $os_patch
 * @property string|null $device
 * @property string|null $device_brand
 * @property string|null $device_model
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static Builder|UserAgent newModelQuery()
 * @method static Builder|UserAgent newQuery()
 * @method static Builder|UserAgent query()
 * @method static Builder|UserAgent whereCreatedAt($value)
 * @method static Builder|UserAgent whereDevice($value)
 * @method static Builder|UserAgent whereDeviceBrand($value)
 * @method static Builder|UserAgent whereDeviceModel($value)
 * @method static Builder|UserAgent whereId($value)
 * @method static Builder|UserAgent whereOs($value)
 * @method static Builder|UserAgent whereOsMajor($value)
 * @method static Builder|UserAgent whereOsMinor($value)
 * @method static Builder|UserAgent whereOsPatch($value)
 * @method static Builder|UserAgent whereUa($value)
 * @method static Builder|UserAgent whereUaMajor($value)
 * @method static Builder|UserAgent whereUaMinor($value)
 * @method static Builder|UserAgent whereUaPatch($value)
 * @method static Builder|UserAgent whereUpdatedAt($value)
 * @method static Builder|UserAgent whereUserAgent($value)
 * @mixin \Eloquent
 */
class UserAgent extends Model
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
     * @return UserAgent
     */
    public static function current(): UserAgent
    {
        $parsed = null;

        try {
            $parsed = Parser::create()
                ->parse(userAgent: request()->headers->get('User-Agent', 'None'));
        }
        catch (Throwable) {}

        return UserAgent::whereUserAgent($parsed?->originalUserAgent)->firstOr(
            function () use ($parsed)
            {
                $attributes = [];
                $attributes['user_agent'] = $parsed?->originalUserAgent;
                $attributes['ua'] = $parsed?->ua?->family;
                $attributes['ua_major'] = $parsed?->ua?->major;
                $attributes['ua_minor'] = $parsed?->ua?->minor;
                $attributes['ua_patch'] = $parsed?->ua?->patch;
                $attributes['os'] = $parsed?->os?->family;
                $attributes['os_major'] = $parsed?->os?->major;
                $attributes['os_minor'] = $parsed?->os?->minor;
                $attributes['os_patch'] = $parsed?->os?->patch;
                $attributes['device'] = $parsed?->device?->family;
                $attributes['device_brand'] = $parsed?->device?->brand;
                $attributes['device_model'] = $parsed?->device?->model;

                return UserAgent::create($attributes);
            }
        );
    }
}
