<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Stephenjude\DefaultModelSorting\Traits\DefaultOrderBy;

/**
 * App\Models\UserAchievement
 *
 * @property int $id
 * @property int $progress
 * @property \Illuminate\Support\Carbon|null $completed_at
 * @property int|null $user_id
 * @property int|null $achievement_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Achievement|null $achievement
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|UserAchievement newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserAchievement newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserAchievement query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserAchievement whereAchievementId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAchievement whereCompletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAchievement whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAchievement whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAchievement whereProgress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAchievement whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAchievement whereUserId($value)
 * @mixin \Eloquent
 */
class UserAchievement extends Model
{
    /**
     *
     */
    use DefaultOrderBy;

    /**
     * @var array
     */
    protected $casts = ['completed_at' => 'datetime'];

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
    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    /**
     * @return HasOne
     */
    public function achievement(): HasOne
    {
        return $this->hasOne(Achievement::class, 'id', 'achievement_id');
    }

    /**
     * @return int|mixed
     */
    public function progressInPercentage(): mixed
    {
        if ($this->achievement instanceof Achievement) {
            if ($this->achievement->purpose !== 0) {
                return max(min(($this->progress / $this->achievement->purpose) * 100, 100), 0);
            }
        }
        return 0;
    }

    /**
     * @return void
     */
    public function increaseProgressByOneUnit(): void
    {
        $this->progress++;

        if ($this->achievement instanceof Achievement) {
            if ($this->progress > $this->achievement->purpose)
                $this->progress = $this->achievement->purpose;

            if (empty($this->completed_at) && $this->progress >= $this->achievement->purpose)
                $this->completed_at = now();
        }

        $this->save();
    }
}
