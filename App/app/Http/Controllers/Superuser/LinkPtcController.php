<?php

namespace App\Http\Controllers\Superuser;

use App\Http\Controllers\Controller;
use App\Http\Requests\Superuser\LinkPtc\StoreRequest;
use App\Http\Requests\Superuser\LinkPtc\UpdateRequest;
use App\Models\LinkPtc;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LinkPtcController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        return view('main.Superuser.LinkPtc.index')
            ->with('collection', LinkPtc::query()->paginate(50));
    }

    /**
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('main.Superuser.LinkPtc.create');
    }

    /**
     * @param StoreRequest $request
     * @return RedirectResponse
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $object = new LinkPtc($request->validated());
        $object->save();

        return to_route('superuser.link-ptc.show', $object->id);
    }

    /**
     * @param LinkPtc $linkPtc
     * @return Application|Factory|View
     */
    public function show(LinkPtc $linkPtc): View|Factory|Application
    {
        return view('main.Superuser.LinkPtc.show')
            ->with('linkPtc', $linkPtc);
    }

    /**
     * @param LinkPtc $linkPtc
     * @return Application|Factory|View
     */
    public function edit(LinkPtc $linkPtc): View|Factory|Application
    {
        return view('main.Superuser.LinkPtc.edit')
            ->with('linkPtc', $linkPtc);
    }

    /**
     * @param UpdateRequest $request
     * @param LinkPtc $linkPtc
     * @return RedirectResponse
     */
    public function update(UpdateRequest $request, LinkPtc $linkPtc): RedirectResponse
    {
        $linkPtc->update($request->validated());

        return to_route('superuser.link-ptc.show', $linkPtc->id);
    }

    /**
     * @param Request $request
     * @param LinkPtc $linkPtc
     * @return RedirectResponse
     */
    public function destroy(Request $request, LinkPtc $linkPtc): RedirectResponse
    {
        $linkPtc->delete();

        return to_route('superuser.link-ptc.index');
    }
}
