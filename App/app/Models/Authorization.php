<?php

namespace App\Models;

use App\Enums\Authorization\CodeEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Stephenjude\DefaultModelSorting\Traits\DefaultOrderBy;

/**
 * App\Models\Authorization
 *
 * @property int $id
 * @property \BenSampo\Enum\Enum|null $code
 * @property int|null $ip_id
 * @property int|null $user_agent_id
 * @property int|null $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Ip|null $ip
 * @property-read \App\Models\User|null $user
 * @property-read \App\Models\UserAgent|null $userAgent
 * @method static \Illuminate\Database\Eloquent\Builder|Authorization newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Authorization newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Authorization query()
 * @method static \Illuminate\Database\Eloquent\Builder|Authorization whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Authorization whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Authorization whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Authorization whereIpId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Authorization whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Authorization whereUserAgentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Authorization whereUserId($value)
 * @mixin \Eloquent
 */
class Authorization extends Model
{
    /**
     *
     */
    use DefaultOrderBy;

    /**
     * @var array
     */
    protected $casts = ['code' => CodeEnum::class];

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
