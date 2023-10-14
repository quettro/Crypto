<?php

namespace App\Http\Controllers\Superuser;

use App\Http\Controllers\Controller;
use App\Http\Requests\Superuser\Link\StoreRequest;
use App\Http\Requests\Superuser\Link\UpdateRequest;
use App\Models\Link;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        return view('main.Superuser.Link.index')
            ->with('collection', Link::query()->paginate(50));
    }

    /**
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('main.Superuser.Link.create');
    }

    /**
     * @param StoreRequest $request
     * @return RedirectResponse
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $object = new Link($request->validated());
        $object->save();

        return to_route('superuser.link.show', $object->id);
    }

    /**
     * @param Link $link
     * @return Application|Factory|View
     */
    public function show(Link $link): View|Factory|Application
    {
        return view('main.Superuser.Link.show')
            ->with('link', $link);
    }

    /**
     * @param Link $link
     * @return Application|Factory|View
     */
    public function edit(Link $link): View|Factory|Application
    {
        return view('main.Superuser.Link.edit')
            ->with('link', $link);
    }

    /**
     * @param UpdateRequest $request
     * @param Link $link
     * @return RedirectResponse
     */
    public function update(UpdateRequest $request, Link $link): RedirectResponse
    {
        $link->update($request->validated());

        return to_route('superuser.link.show', $link->id);
    }

    /**
     * @param Request $request
     * @param Link $link
     * @return RedirectResponse
     */
    public function destroy(Request $request, Link $link): RedirectResponse
    {
        $link->delete();

        return to_route('superuser.link.index');
    }
}
