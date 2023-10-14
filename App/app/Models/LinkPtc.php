<?php

namespace App\Models;

use App\Enums\LinkPtc\StatusEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Stephenjude\DefaultModelSorting\Traits\DefaultOrderBy;

/**
 * App\Models\LinkPtc
 *
 * @property int $id
 * @property string $uniqid
 * @property \BenSampo\Enum\Enum|null $status
 * @property int|null $link_id
 * @property int|null $ip_id
 * @property int|null $user_agent_id
 * @property int|null $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Ip|null $ip
 * @property-read \App\Models\Link|null $link
 * @property-read \App\Models\User|null $user
 * @property-read \App\Models\UserAgent|null $userAgent
 * @method static \Illuminate\Database\Eloquent\Builder|LinkPtc newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LinkPtc newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LinkPtc query()
 * @method static \Illuminate\Database\Eloquent\Builder|LinkPtc whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LinkPtc whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LinkPtc whereIpId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LinkPtc whereLinkId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LinkPtc whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LinkPtc whereUniqid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LinkPtc whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LinkPtc whereUserAgentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LinkPtc whereUserId($value)
 * @mixin \Eloquent
 */
class LinkPtc extends Model
{
    /**
     *
     */
    use DefaultOrderBy;

    /**
     * @var array
     */
    protected $casts = ['status' => StatusEnum::class];

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
    public function link(): HasOne
    {
        return $this->hasOne(Link::class, 'id', 'link_id');
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
