<?php

namespace App\Http\Controllers\Superuser;

use App\Http\Controllers\Controller;
use App\Http\Requests\Superuser\UserAgent\StoreRequest;
use App\Http\Requests\Superuser\UserAgent\UpdateRequest;
use App\Models\UserAgent;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserAgentController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        return view('main.Superuser.UserAgent.index')
            ->with('collection', UserAgent::query()->paginate(50));
    }

    /**
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('main.Superuser.UserAgent.create');
    }

    /**
     * @param StoreRequest $request
     * @return RedirectResponse
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $object = new UserAgent($request->validated());
        $object->save();

        return to_route('superuser.user-agent.show', $object->id);
    }

    /**
     * @param UserAgent $userAgent
     * @return Application|Factory|View
     */
    public function show(UserAgent $userAgent): View|Factory|Application
    {
        return view('main.Superuser.UserAgent.show')
            ->with('user_agent', $userAgent);
    }

    /**
     * @param UserAgent $userAgent
     * @return Application|Factory|View
     */
    public function edit(UserAgent $userAgent): View|Factory|Application
    {
        return view('main.Superuser.UserAgent.edit')
            ->with('user_agent', $userAgent);
    }

    /**
     * @param UpdateRequest $request
     * @param UserAgent $userAgent
     * @return RedirectResponse
     */
    public function update(UpdateRequest $request, UserAgent $userAgent): RedirectResponse
    {
        $userAgent->update($request->validated());

        return to_route('superuser.user-agent.show', $userAgent->id);
    }

    /**
     * @param Request $request
     * @param UserAgent $userAgent
     * @return RedirectResponse
     */
    public function destroy(Request $request, UserAgent $userAgent): RedirectResponse
    {
        $userAgent->delete();

        return to_route('superuser.user-agent.index');
    }
}
