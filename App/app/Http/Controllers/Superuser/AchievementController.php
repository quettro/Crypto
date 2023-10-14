<?php

namespace App\Http\Controllers\Superuser;

use App\Http\Controllers\Controller;
use App\Http\Requests\Superuser\Achievement\StoreRequest;
use App\Http\Requests\Superuser\Achievement\UpdateRequest;
use App\Models\Achievement;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AchievementController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        return view('main.Superuser.Achievement.index')
            ->with('collection', Achievement::query()->paginate(50));
    }

    /**
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('main.Superuser.Achievement.create');
    }

    /**
     * @param StoreRequest $request
     * @return RedirectResponse
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $object = new Achievement($request->validated());
        $object->save();

        return to_route('superuser.achievement.show', $object->id);
    }

    /**
     * @param Achievement $achievement
     * @return Application|Factory|View
     */
    public function show(Achievement $achievement): View|Factory|Application
    {
        return view('main.Superuser.Achievement.show')
            ->with('achievement', $achievement);
    }

    /**
     * @param Achievement $achievement
     * @return Application|Factory|View
     */
    public function edit(Achievement $achievement): View|Factory|Application
    {
        return view('main.Superuser.Achievement.edit')
            ->with('achievement', $achievement);
    }

    /**
     * @param UpdateRequest $request
     * @param Achievement $achievement
     * @return RedirectResponse
     */
    public function update(UpdateRequest $request, Achievement $achievement): RedirectResponse
    {
        $achievement->update($request->validated());

        return to_route('superuser.achievement.show', $achievement->id);
    }

    /**
     * @param Request $request
     * @param Achievement $achievement
     * @return RedirectResponse
     */
    public function destroy(Request $request, Achievement $achievement): RedirectResponse
    {
        $achievement->delete();

        return to_route('superuser.achievement.index');
    }
}
