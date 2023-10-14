<?php

namespace App\Http\Controllers\Superuser;

use App\Http\Controllers\Controller;
use App\Http\Requests\Superuser\Activity\StoreRequest;
use App\Http\Requests\Superuser\Activity\UpdateRequest;
use App\Models\Activity;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ActivityController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        return view('main.Superuser.Activity.index')
            ->with('collection', Activity::query()->paginate(50));
    }

    /**
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('main.Superuser.Activity.create');
    }

    /**
     * @param StoreRequest $request
     * @return RedirectResponse
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $object = new Activity($request->validated());
        $object->save();

        return to_route('superuser.activity.show', $object->id);
    }

    /**
     * @param Activity $activity
     * @return Application|Factory|View
     */
    public function show(Activity $activity): View|Factory|Application
    {
        return view('main.Superuser.Activity.show')
            ->with('activity', $activity);
    }

    /**
     * @param Activity $activity
     * @return Application|Factory|View
     */
    public function edit(Activity $activity): View|Factory|Application
    {
        return view('main.Superuser.Activity.edit')
            ->with('activity', $activity);
    }

    /**
     * @param UpdateRequest $request
     * @param Activity $activity
     * @return RedirectResponse
     */
    public function update(UpdateRequest $request, Activity $activity): RedirectResponse
    {
        $activity->update($request->validated());

        return to_route('superuser.activity.show', $activity->id);
    }
}
