<?php

namespace App\Observers;

use App\Models\Achievement;
use App\Models\User;

class UserObserver
{
    /**
     * @param User $user
     * @return void
     */
    public function created(User $user): void
    {
        foreach (Achievement::lazy() as $achievement) {
            $attributes = [];
            $attributes['progress'] = 0;
            $attributes['achievement_id'] = $achievement->id;

            $user->achievementHasMany()->create($attributes);
        }
    }
}
