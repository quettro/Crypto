<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Stephenjude\DefaultModelSorting\Traits\DefaultOrderBy;

/**
 * App\Models\Activity
 *
 * @property int $id
 * @property string $message
 * @property array|null $payload
 * @property int|null $ip_id
 * @property int|null $user_agent_id
 * @property int|null $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Ip|null $ip
 * @property-read \App\Models\User|null $user
 * @property-read \App\Models\UserAgent|null $userAgent
 * @method static \Illuminate\Database\Eloquent\Builder|Activity newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Activity newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Activity query()
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereIpId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity wherePayload($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereUserAgentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereUserId($value)
 * @mixin \Eloquent
 */
class Activity extends Model
{
    /**
     *
     */
    use DefaultOrderBy;

    /**
     * @var string[]
     */
    protected $casts = ['payload' => 'array'];

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
     * @return HasOne
     */
    public function ip(): HasOne
    {
        return $this->hasOne(Ip::class, 'id', 'ip_id');
    }

    /**
     * @return HasOne
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    /**
     * @return HasOne
     */
    public function userAgent(): HasOne
    {
        return $this->hasOne(UserAgent::class, 'id', 'user_agent_id');
    }
}
