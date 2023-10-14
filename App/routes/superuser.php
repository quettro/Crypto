<?php

use Illuminate\Support\Facades\Route;

Route::group(
    [
        'as' => 'superuser.',
        'prefix' => 'superuser',
        'middleware' => ['auth', 'verified', 'superuser'],
    ],
    function () {
        Route::group(
            [
                'as' => 'dashboard',
                'prefix' => 'dashboard',
                'controller' => \App\Http\Controllers\Superuser\DashboardController::class,
            ],
            function () {
                Route::match(['GET', 'HEAD'], '/', 'index');
            }
        );

        Route::group(
            [
                'as' => 'setting.',
                'prefix' => 'setting',
                'controller' => \App\Http\Controllers\Superuser\SettingController::class,
            ],
            function () {
                Route::match(['GET', 'HEAD'], '/', 'show')->name('show');
                Route::match(['GET', 'HEAD'], '/edit', 'edit')->name('edit');
                Route::match(['PUT', 'PATCH'], '/', 'update')->name('update');
            }
        );

        Route::group(
            [
                'as' => 'notification.',
                'prefix' => 'notification',
                'controller' => \App\Http\Controllers\Superuser\NotificationController::class,
            ],
            function () {
                Route::match(['GET', 'HEAD'], '/', 'index')->name('index');

                Route::group(
                    [
                        'prefix' => '{notification}',
                    ],
                    function () {
                        Route::match(['GET', 'HEAD'], '/', 'show')->name('show');
                        Route::match(['DELETE'], '/', 'destroy')->name('destroy');
                    }
                );
            }
        );

        Route::group(
            [
                'as' => 'activity.',
                'prefix' => 'activity',
                'controller' => \App\Http\Controllers\Superuser\ActivityController::class,
            ],
            function () {
                Route::match(['GET', 'HEAD'], '/', 'index')->name('index');
                Route::match(['GET', 'HEAD'], '/create', 'create')->name('create');
                Route::match(['POST'], '/', 'store')->name('store');

                Route::group(
                    [
                        'prefix' => '{activity}',
                    ],
                    function () {
                        Route::match(['GET', 'HEAD'], '/', 'show')->name('show');
                        Route::match(['GET', 'HEAD'], '/edit', 'edit')->name('edit');
                        Route::match(['PUT', 'PATCH'], '/', 'update')->name('update');
                    }
                );
            }
        );

        Route::group(
            [
                'as' => 'faq.',
                'prefix' => 'faq',
                'controller' => \App\Http\Controllers\Superuser\FaqController::class,
            ],
            function () {
                Route::match(['GET', 'HEAD'], '/', 'index')->name('index');
                Route::match(['GET', 'HEAD'], '/create', 'create')->name('create');
                Route::match(['POST'], '/', 'store')->name('store');

                Route::group(
                    [
                        'prefix' => '{faq}',
                    ],
                    function () {
                        Route::match(['GET', 'HEAD'], '/', 'show')->name('show');
                        Route::match(['GET', 'HEAD'], '/edit', 'edit')->name('edit');
                        Route::match(['PUT', 'PATCH'], '/', 'update')->name('update');
                        Route::match(['DELETE'], '/', 'destroy')->name('destroy');
                    }
                );
            }
        );

        Route::group(
            [
                'as' => 'feedback.',
                'prefix' => 'feedback',
                'controller' => \App\Http\Controllers\Superuser\FeedbackController::class,
            ],
            function () {
                Route::match(['GET', 'HEAD'], '/', 'index')->name('index');
                Route::match(['GET', 'HEAD'], '/create', 'create')->name('create');
                Route::match(['POST'], '/', 'store')->name('store');

                Route::group(
                    [
                        'prefix' => '{feedback}',
                    ],
                    function () {
                        Route::match(['GET', 'HEAD'], '/', 'show')->name('show');
                        Route::match(['GET', 'HEAD'], '/edit', 'edit')->name('edit');
                        Route::match(['PUT', 'PATCH'], '/', 'update')->name('update');
                        Route::match(['DELETE'], '/', 'destroy')->name('destroy');
                    }
                );
            }
        );

        Route::group(
            [
                'as' => 'ip.',
                'prefix' => 'ip',
                'controller' => \App\Http\Controllers\Superuser\IpController::class,
            ],
            function () {
                Route::match(['GET', 'HEAD'], '/', 'index')->name('index');
                Route::match(['GET', 'HEAD'], '/create', 'create')->name('create');
                Route::match(['POST'], '/', 'store')->name('store');

                Route::group(
                    [
                        'prefix' => '{ip}',
                    ],
                    function () {
                        Route::match(['GET', 'HEAD'], '/', 'show')->name('show');
                        Route::match(['GET', 'HEAD'], '/edit', 'edit')->name('edit');
                        Route::match(['PUT', 'PATCH'], '/', 'update')->name('update');
                        Route::match(['DELETE'], '/', 'destroy')->name('destroy');
                    }
                );
            }
        );

        Route::group(
            [
                'as' => 'user-agent.',
                'prefix' => 'user-agent',
                'controller' => \App\Http\Controllers\Superuser\UserAgentController::class,
            ],
            function () {
                Route::match(['GET', 'HEAD'], '/', 'index')->name('index');
                Route::match(['GET', 'HEAD'], '/create', 'create')->name('create');
                Route::match(['POST'], '/', 'store')->name('store');

                Route::group(
                    [
                        'prefix' => '{userAgent}',
                    ],
                    function () {
                        Route::match(['GET', 'HEAD'], '/', 'show')->name('show');
                        Route::match(['GET', 'HEAD'], '/edit', 'edit')->name('edit');
                        Route::match(['PUT', 'PATCH'], '/', 'update')->name('update');
                        Route::match(['DELETE'], '/', 'destroy')->name('destroy');
                    }
                );
            }
        );

        Route::group(
            [
                'as' => 'user.',
                'prefix' => 'user',
                'controller' => \App\Http\Controllers\Superuser\UserController::class,
            ],
            function () {
                Route::match(['GET', 'HEAD'], '/', 'index')->name('index');
                Route::match(['GET', 'HEAD'], '/create', 'create')->name('create');
                Route::match(['POST'], '/', 'store')->name('store');

                Route::group(
                    [
                        'prefix' => '{user}',
                    ],
                    function () {
                        Route::match(['GET', 'HEAD'], '/', 'show')->name('show');
                        Route::match(['GET', 'HEAD'], '/edit', 'edit')->name('edit');
                        Route::match(['PUT', 'PATCH'], '/', 'update')->name('update');
                        Route::match(['DELETE'], '/', 'destroy')->name('destroy');
                    }
                );
            }
        );

        Route::group(
            [
                'as' => 'referral.',
                'prefix' => 'referral',
                'controller' => \App\Http\Controllers\Superuser\ReferralController::class,
            ],
            function () {
                Route::match(['GET', 'HEAD'], '/', 'index')->name('index');
                Route::match(['GET', 'HEAD'], '/create', 'create')->name('create');
                Route::match(['POST'], '/', 'store')->name('store');

                Route::group(
                    [
                        'prefix' => '{referral}',
                    ],
                    function () {
                        Route::match(['GET', 'HEAD'], '/', 'show')->name('show');
                        Route::match(['GET', 'HEAD'], '/edit', 'edit')->name('edit');
                        Route::match(['PUT', 'PATCH'], '/', 'update')->name('update');
                        Route::match(['DELETE'], '/', 'destroy')->name('destroy');
                    }
                );
            }
        );

        Route::group(
            [
                'as' => 'authorization.',
                'prefix' => 'authorization',
                'controller' => \App\Http\Controllers\Superuser\AuthorizationController::class,
            ],
            function () {
                Route::match(['GET', 'HEAD'], '/', 'index')->name('index');
                Route::match(['GET', 'HEAD'], '/create', 'create')->name('create');
                Route::match(['POST'], '/', 'store')->name('store');

                Route::group(
                    [
                        'prefix' => '{authorization}',
                    ],
                    function () {
                        Route::match(['GET', 'HEAD'], '/', 'show')->name('show');
                        Route::match(['GET', 'HEAD'], '/edit', 'edit')->name('edit');
                        Route::match(['PUT', 'PATCH'], '/', 'update')->name('update');
                        Route::match(['DELETE'], '/', 'destroy')->name('destroy');
                    }
                );
            }
        );

        Route::group(
            [
                'as' => 'transaction.',
                'prefix' => 'transaction',
                'controller' => \App\Http\Controllers\Superuser\TransactionController::class,
            ],
            function () {
                Route::match(['GET', 'HEAD'], '/', 'index')->name('index');
                Route::match(['GET', 'HEAD'], '/create', 'create')->name('create');
                Route::match(['POST'], '/', 'store')->name('store');

                Route::group(
                    [
                        'prefix' => '{transaction}',
                    ],
                    function () {
                        Route::match(['GET', 'HEAD'], '/', 'show')->name('show');
                        Route::match(['GET', 'HEAD'], '/edit', 'edit')->name('edit');
                        Route::match(['PUT', 'PATCH'], '/', 'update')->name('update');
                        Route::match(['DELETE'], '/', 'destroy')->name('destroy');
                    }
                );
            }
        );

        Route::group(
            [
                'as' => 'link.',
                'prefix' => 'link',
                'controller' => \App\Http\Controllers\Superuser\LinkController::class,
            ],
            function () {
                Route::match(['GET', 'HEAD'], '/', 'index')->name('index');
                Route::match(['GET', 'HEAD'], '/create', 'create')->name('create');
                Route::match(['POST'], '/', 'store')->name('store');

                Route::group(
                    [
                        'prefix' => '{link}',
                    ],
                    function () {
                        Route::match(['GET', 'HEAD'], '/', 'show')->name('show');
                        Route::match(['GET', 'HEAD'], '/edit', 'edit')->name('edit');
                        Route::match(['PUT', 'PATCH'], '/', 'update')->name('update');
                        Route::match(['DELETE'], '/', 'destroy')->name('destroy');
                    }
                );
            }
        );

        Route::group(
            [
                'as' => 'link-ptc.',
                'prefix' => 'link-ptc',
                'controller' => \App\Http\Controllers\Superuser\LinkPtcController::class,
            ],
            function () {
                Route::match(['GET', 'HEAD'], '/', 'index')->name('index');
                Route::match(['GET', 'HEAD'], '/create', 'create')->name('create');
                Route::match(['POST'], '/', 'store')->name('store');

                Route::group(
                    [
                        'prefix' => '{linkPtc}',
                    ],
                    function () {
                        Route::match(['GET', 'HEAD'], '/', 'show')->name('show');
                        Route::match(['GET', 'HEAD'], '/edit', 'edit')->name('edit');
                        Route::match(['PUT', 'PATCH'], '/', 'update')->name('update');
                        Route::match(['DELETE'], '/', 'destroy')->name('destroy');
                    }
                );
            }
        );

        Route::group(
            [
                'as' => 'achievement.',
                'prefix' => 'achievement',
                'controller' => \App\Http\Controllers\Superuser\AchievementController::class,
            ],
            function () {
                Route::match(['GET', 'HEAD'], '/', 'index')->name('index');
                Route::match(['GET', 'HEAD'], '/create', 'create')->name('create');
                Route::match(['POST'], '/', 'store')->name('store');

                Route::group(
                    [
                        'prefix' => '{achievement}',
                    ],
                    function () {
                        Route::match(['GET', 'HEAD'], '/', 'show')->name('show');
                        Route::match(['GET', 'HEAD'], '/edit', 'edit')->name('edit');
                        Route::match(['PUT', 'PATCH'], '/', 'update')->name('update');
                        Route::match(['DELETE'], '/', 'destroy')->name('destroy');
                    }
                );
            }
        );

        Route::group(
            [
                'as' => 'user-achievement.',
                'prefix' => 'user-achievement',
                'controller' => \App\Http\Controllers\Superuser\UserAchievementController::class,
            ],
            function () {
                Route::match(['GET', 'HEAD'], '/', 'index')->name('index');
                Route::match(['GET', 'HEAD'], '/create', 'create')->name('create');
                Route::match(['POST'], '/', 'store')->name('store');

                Route::group(
                    [
                        'prefix' => '{userAchievement}',
                    ],
                    function () {
                        Route::match(['GET', 'HEAD'], '/', 'show')->name('show');
                        Route::match(['GET', 'HEAD'], '/edit', 'edit')->name('edit');
                        Route::match(['PUT', 'PATCH'], '/', 'update')->name('update');
                        Route::match(['DELETE'], '/', 'destroy')->name('destroy');
                    }
                );
            }
        );
    }
);
