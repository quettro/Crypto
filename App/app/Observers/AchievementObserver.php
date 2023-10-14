<?php

namespace App\Observers;

use App\Models\Achievement;
use App\Models\User;
use App\Models\UserAchievement;

class AchievementObserver
{
    /**
     * @param Achievement $achievement
     * @return void
     */
    public function deleted(Achievement $achievement): void
    {
        UserAchievement::query()
            ->where('achievement_id', $achievement->id)->each(fn ($object) => $object->delete());
    }

    /**
     * @param Achievement $achievement
     * @return void
     */
    public function created(Achievement $achievement): void
    {
        foreach (User::lazy() as $user) {
            $attributes = [];
            $attributes['progress'] = 0;
            $attributes['achievement_id'] = $achievement->id;

            $user->achievementHasMany()->create($attributes);
        }
    }
}
