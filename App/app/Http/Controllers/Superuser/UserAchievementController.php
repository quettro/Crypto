<?php

namespace App\Http\Controllers\Superuser;

use App\Http\Controllers\Controller;
use App\Http\Requests\Superuser\UserAchievement\StoreRequest;
use App\Http\Requests\Superuser\UserAchievement\UpdateRequest;
use App\Models\UserAchievement;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserAchievementController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        return view('main.Superuser.UserAchievement.index')
            ->with('collection', UserAchievement::query()->paginate(50));
    }

    /**
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('main.Superuser.UserAchievement.create');
    }

    /**
     * @param StoreRequest $request
     * @return RedirectResponse
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $object = new UserAchievement($request->validated());
        $object->save();

        return to_route('superuser.user-achievement.show', $object->id);
    }

    /**
     * @param UserAchievement $userAchievement
     * @return Application|Factory|View
     */
    public function show(UserAchievement $userAchievement): View|Factory|Application
    {
        return view('main.Superuser.UserAchievement.show')
            ->with('userAchievement', $userAchievement);
    }

    /**
     * @param UserAchievement $userAchievement
     * @return Application|Factory|View
     */
    public function edit(UserAchievement $userAchievement): View|Factory|Application
    {
        return view('main.Superuser.UserAchievement.edit')
            ->with('userAchievement', $userAchievement);
    }

    /**
     * @param UpdateRequest $request
     * @param UserAchievement $userAchievement
     * @return RedirectResponse
     */
    public function update(UpdateRequest $request, UserAchievement $userAchievement): RedirectResponse
    {
        $userAchievement->update($request->validated());

        return to_route('superuser.user-achievement.show', $userAchievement->id);
    }

    /**
     * @param Request $request
     * @param UserAchievement $userAchievement
     * @return RedirectResponse
     */
    public function destroy(Request $request, UserAchievement $userAchievement): RedirectResponse
    {
        $userAchievement->delete();

        return to_route('superuser.user-achievement.index');
    }
}
