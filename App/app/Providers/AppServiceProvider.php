<?php

namespace App\Providers;

use App\Macros\StringableMacros;
use App\Models\Achievement;
use App\Models\LinkPtc;
use App\Models\User;
use App\Observers\AchievementObserver;
use App\Observers\LinkPtcObserver;
use App\Observers\UserObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Stringable;

class AppServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function register(): void
    {
    }

    /**
     * @return void
     * @throws \ReflectionException
     */
    public function boot(): void
    {
        #
        User::observe(UserObserver::class);

        #
        LinkPtc::observe(LinkPtcObserver::class);

        #
        Achievement::observe(AchievementObserver::class);

        #
        Stringable::mixin(new StringableMacros());
    }
}
