<?php

namespace App\Models;

use App\Enums\Transaction\SourceEnum as TransactionSourceEnum;
use App\Enums\Transaction\TypeEnum as TransactionTypeEnum;
use App\Enums\User\StatusEnum;
use App\Enums\User\SuperuserEnum;
use App\Notifications\Authorized\BalanceToppedUpNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Stephenjude\DefaultModelSorting\Traits\DefaultOrderBy;

/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property string|null $referer
 * @property string $balance
 * @property \Illuminate\Support\Carbon|null $last_activity_at
 * @property \BenSampo\Enum\Enum|null $superuser
 * @property \BenSampo\Enum\Enum|null $status
 * @property int|null $ip_id
 * @property int|null $user_agent_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\UserAchievement> $achievementHasMany
 * @property-read int|null $achievement_has_many_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Activity> $activityHasMany
 * @property-read int|null $activity_has_many_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Authorization> $authorizationHasMany
 * @property-read int|null $authorization_has_many_count
 * @property-read \App\Models\Ip|null $ip
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\LinkPtc> $linkHasMany
 * @property-read int|null $link_has_many_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Referral> $referralHasMany
 * @property-read int|null $referral_has_many_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Transaction> $transactionHasMany
 * @property-read int|null $transaction_has_many_count
 * @property-read \App\Models\UserAgent|null $userAgent
 * @method static Builder|User newModelQuery()
 * @method static Builder|User newQuery()
 * @method static Builder|User query()
 * @method static Builder|User whereBalance($value)
 * @method static Builder|User whereCreatedAt($value)
 * @method static Builder|User whereEmail($value)
 * @method static Builder|User whereEmailVerifiedAt($value)
 * @method static Builder|User whereId($value)
 * @method static Builder|User whereIpId($value)
 * @method static Builder|User whereLastActivityAt($value)
 * @method static Builder|User whereName($value)
 * @method static Builder|User wherePassword($value)
 * @method static Builder|User whereReferer($value)
 * @method static Builder|User whereRememberToken($value)
 * @method static Builder|User whereStatus($value)
 * @method static Builder|User whereSuperuser($value)
 * @method static Builder|User whereUpdatedAt($value)
 * @method static Builder|User whereUserAgentId($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable implements MustVerifyEmail
{
    /**
     *
     */
    use HasApiTokens, Notifiable, DefaultOrderBy;

    /**
     * @var array
     */
    protected $casts = ['last_activity_at' => 'datetime', 'status' => StatusEnum::class, 'superuser' => SuperuserEnum::class];

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
    public function userAgent(): HasOne
    {
        return $this->hasOne(UserAgent::class, 'id', 'user_agent_id');
    }

    /**
     * @return HasMany
     */
    public function linkHasMany(): HasMany
    {
        return $this->hasMany(LinkPtc::class, 'user_id', 'id');
    }

    /**
     * @return HasMany
     */
    public function activityHasMany(): HasMany
    {
        return $this->hasMany(Activity::class, 'user_id', 'id');
    }

    /**
     * @return HasMany
     */
    public function referralHasMany(): HasMany
    {
        return $this->hasMany(Referral::class, 'referrer_id', 'id');
    }

    /**
     * @return HasMany
     */
    public function achievementHasMany(): HasMany
    {
        return $this->hasMany(UserAchievement::class, 'user_id', 'id');
    }

    /**
     * @return HasMany
     */
    public function transactionHasMany(): HasMany
    {
        return $this->hasMany(Transaction::class, 'user_id', 'id');
    }

    /**
     * @return HasMany
     */
    public function authorizationHasMany(): HasMany
    {
        return $this->hasMany(Authorization::class, 'user_id', 'id');
    }

    /**
     * @param string $message
     * @param array $payload
     * @param bool $save
     * @return Model
     */
    public function makeActivity(string $message, array $payload = [], bool $save = true): Model
    {
        $attributes = [];
        $attributes['message'] = $message;
        $attributes['payload'] = $payload;
        $attributes['ip_id'] = Ip::current()->id;
        $attributes['user_agent_id'] = UserAgent::current()->id;

        return $save ? $this->activityHasMany()->create($attributes) : $this->activityHasMany()->make($attributes);
    }

    /**
     * @param Builder $builder
     * @return void
     */
    public function increaseProgress(Builder $builder): void
    {
        foreach ($builder->lazy() as $userAchievement)
        {
            if ($userAchievement instanceof UserAchievement) {
                $userAchievement->increaseProgressByOneUnit();

                if (!empty($userAchievement->completed_at))
                    if ($userAchievement->achievement instanceof Achievement)
                        $this->topUpBalance($userAchievement->achievement->tether, new TransactionSourceEnum(TransactionSourceEnum::A));
            }
        }
    }

    /**
     * @param float $amount
     * @param TransactionSourceEnum $source
     * @return void
     */
    public function topUpBalance(float $amount, TransactionSourceEnum $source): void
    {
        #
        $this->increment('balance', $amount);

        #
        $attributes = [];
        $attributes['type'] = TransactionTypeEnum::ADD;
        $attributes['source'] = $source->value;
        $attributes['tether'] = $amount;
        $attributes['ip_id'] = Ip::current()->id;
        $attributes['user_agent_id'] = UserAgent::current()->id;

        $transaction = $this->transactionHasMany()->make($attributes);
        $transaction->save();

        #
        $this->notify(new BalanceToppedUpNotification($amount));
    }
}
