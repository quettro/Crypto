<?php

namespace App\Http\Controllers\Authorized;

use App\Enums\Achievement\StatusEnum;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class AchievementController extends Controller
{
    /**
     * @return Factory|View|Application
     */
    public function index(): Factory|View|Application
    {
        $collection = Auth::user()->achievementHasMany()
            ->with('achievement')->whereRelation('achievement', 'status', StatusEnum::Y)->get();

        return view('main.Authorized.Achievement.index')
            ->with('collection', $collection);
    }
}
