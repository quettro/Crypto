<?php

namespace App\Http\Controllers\Superuser;

use App\Http\Controllers\Controller;
use App\Http\Requests\Superuser\Authorization\StoreRequest;
use App\Http\Requests\Superuser\Authorization\UpdateRequest;
use App\Models\Authorization;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AuthorizationController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        return view('main.Superuser.Authorization.index')
            ->with('collection', Authorization::query()->paginate(50));
    }

    /**
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('main.Superuser.Authorization.create');
    }

    /**
     * @param StoreRequest $request
     * @return RedirectResponse
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $object = new Authorization($request->validated());
        $object->save();

        return to_route('superuser.authorization.show', $object->id);
    }

    /**
     * @param Authorization $authorization
     * @return Application|Factory|View
     */
    public function show(Authorization $authorization): View|Factory|Application
    {
        return view('main.Superuser.Authorization.show')
            ->with('authorization', $authorization);
    }

    /**
     * @param Authorization $authorization
     * @return Application|Factory|View
     */
    public function edit(Authorization $authorization): View|Factory|Application
    {
        return view('main.Superuser.Authorization.edit')
            ->with('authorization', $authorization);
    }

    /**
     * @param UpdateRequest $request
     * @param Authorization $authorization
     * @return RedirectResponse
     */
    public function update(UpdateRequest $request, Authorization $authorization): RedirectResponse
    {
        $authorization->update($request->validated());

        return to_route('superuser.authorization.show', $authorization->id);
    }

    /**
     * @param Request $request
     * @param Authorization $authorization
     * @return RedirectResponse
     */
    public function destroy(Request $request, Authorization $authorization): RedirectResponse
    {
        $authorization->delete();

        return to_route('superuser.authorization.index');
    }
}
