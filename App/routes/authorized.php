<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::group(
        [
            'as' => 'dashboard',
            'prefix' => 'dashboard',
            'controller' => \App\Http\Controllers\Authorized\DashboardController::class,
        ],
        function () {
            Route::match(['GET', 'HEAD'], '/', 'index');
        }
    );

    Route::group(
        [
            'as' => 'achievement.',
            'prefix' => 'achievement',
            'controller' => \App\Http\Controllers\Authorized\AchievementController::class,
        ],
        function () {
            Route::match(['GET', 'HEAD'], '/', 'index')->name('index');
        }
    );

    Route::group(
        [
            'as' => 'settings.',
            'prefix' => 'settings',
            'controller' => \App\Http\Controllers\Authorized\SettingsController::class,
        ],
        function () {
            Route::match(['GET', 'HEAD'], '/', 'index')->name('index');
        }
    );

    Route::group(
        [
            'as' => 'settings.password.',
            'prefix' => 'settings/password',
            'controller' => \App\Http\Controllers\Authorized\Settings\PasswordController::class,
        ],
        function () {
            Route::match(['PUT', 'PATCH'], '/', 'update')->name('update');
        }
    );

    Route::group(
        [
            'as' => 'referral.',
            'prefix' => 'referral',
            'controller' => \App\Http\Controllers\Authorized\ReferralController::class,
        ],
        function () {
            Route::match(['GET', 'HEAD'], '/', 'index')->name('index');
        }
    );

    Route::group(
        [
            'as' => 'support.',
            'prefix' => 'support',
            'controller' => \App\Http\Controllers\Authorized\SupportController::class,
        ],
        function () {
            Route::match(['GET', 'HEAD'], '/', 'index')->name('index');
            Route::match(['POST'], '/', 'store')->name('store');
        }
    );

    Route::group(
        [
            'as' => 'freebie.',
            'prefix' => 'freebie',
            'controller' => \App\Http\Controllers\Authorized\FreebieController::class,
        ],
        function () {
            Route::match(['GET', 'HEAD'], '/', 'index')->name('index');
            Route::match(['POST'], '/', 'store')->name('store');
        }
    );

    Route::group(
        [
            'as' => 'notification.',
            'prefix' => 'notification',
            'controller' => \App\Http\Controllers\Authorized\NotificationController::class,
        ],
        function () {
            Route::match(['GET', 'HEAD'], '/xhr', 'xhr')->name('xhr');
            Route::match(['POST'], '/xhr-read-all', 'xhrReadAll')->name('xhrReadAll');
        }
    );

    Route::group(
        [
            'as' => 'link.',
            'prefix' => 'link',
            'controller' => \App\Http\Controllers\Authorized\LinkController::class,
        ],
        function () {
            Route::match(['GET', 'HEAD'], '/', 'index')->name('index');

            Route::group(
                [
                    'prefix' => '{link}',
                ],
                function () {
                    Route::match(['GET', 'HEAD'], '/visit', 'visit')->name('visit');
                    Route::match(['GET', 'HEAD'], '/verification/{uniqid}', 'verification')->name('verification');
                }
            );
        }
    );
});
