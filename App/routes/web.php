<?php

use Illuminate\Support\Facades\Route;


require_once __DIR__ . '/auth.php';
require_once __DIR__ . '/authorized.php';
require_once __DIR__ . '/superuser.php';


Route::get('/', [
    \App\Http\Controllers\WelcomeController::class, 'index'
])
    ->middleware(['referral'])->name('welcome');

Route::get('/agreement', [
    \App\Http\Controllers\AgreementController::class, 'index'
])
    ->name('agreement');
