<?php

namespace App\Models;

use App\Enums\Transaction\SourceEnum;
use App\Enums\Transaction\TypeEnum;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Stephenjude\DefaultModelSorting\Traits\DefaultOrderBy;

/**
 * App\Models\Transaction
 *
 * @property int $id
 * @property \BenSampo\Enum\Enum|null $type
 * @property \BenSampo\Enum\Enum|null $source
 * @property string $tether
 * @property int|null $ip_id
 * @property int|null $user_agent_id
 * @property int|null $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Ip|null $ip
 * @property-read \App\Models\User|null $user
 * @property-read \App\Models\UserAgent|null $userAgent
 * @method static Builder|Transaction forTheCurrentDayOrMore()
 * @method static Builder|Transaction newModelQuery()
 * @method static Builder|Transaction newQuery()
 * @method static Builder|Transaction onlyTheASource()
 * @method static Builder|Transaction onlyTheAddType()
 * @method static Builder|Transaction onlyTheFSource()
 * @method static Builder|Transaction onlyTheLSource()
 * @method static Builder|Transaction onlyTheSubType()
 * @method static Builder|Transaction query()
 * @method static Builder|Transaction whereCreatedAt($value)
 * @method static Builder|Transaction whereId($value)
 * @method static Builder|Transaction whereIpId($value)
 * @method static Builder|Transaction whereSource($value)
 * @method static Builder|Transaction whereTether($value)
 * @method static Builder|Transaction whereType($value)
 * @method static Builder|Transaction whereUpdatedAt($value)
 * @method static Builder|Transaction whereUserAgentId($value)
 * @method static Builder|Transaction whereUserId($value)
 * @mixin \Eloquent
 */
class Transaction extends Model
{
    /**
     *
     */
    use DefaultOrderBy;

    /**
     * @var array
     */
    protected $casts = ['type' => TypeEnum::class, 'source' => SourceEnum::class];

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

    /**
     * @param Builder $builder
     * @return void
     */
    public function scopeOnlyTheSubType(Builder $builder): void
    {
        $builder->where('type', TypeEnum::SUB);
    }

    /**
     * @param Builder $builder
     * @return void
     */
    public function scopeOnlyTheAddType(Builder $builder): void
    {
        $builder->where('type', TypeEnum::ADD);
    }

    /**
     * @param Builder $builder
     * @return void
     */
    public function scopeOnlyTheASource(Builder $builder): void
    {
        $builder->where('source', SourceEnum::A);
    }

    /**
     * @param Builder $builder
     * @return void
     */
    public function scopeOnlyTheFSource(Builder $builder): void
    {
        $builder->where('source', SourceEnum::F);
    }

    /**
     * @param Builder $builder
     * @return void
     */
    public function scopeOnlyTheLSource(Builder $builder): void
    {
        $builder->where('source', SourceEnum::L);
    }

    /**
     * @param Builder $builder
     * @return void
     */
    public function scopeForTheCurrentDayOrMore(Builder $builder): void
    {
        $builder->where('created_at', '>=', Carbon::today());
    }
}
