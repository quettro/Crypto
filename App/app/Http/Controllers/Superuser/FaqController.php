<?php

namespace App\Http\Controllers\Superuser;

use App\Http\Controllers\Controller;
use App\Http\Requests\Superuser\Faq\StoreRequest;
use App\Http\Requests\Superuser\Faq\UpdateRequest;
use App\Models\Faq;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        return view('main.Superuser.Faq.index')
            ->with('collection', Faq::query()->paginate(50));
    }

    /**
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('main.Superuser.Faq.create');
    }

    /**
     * @param StoreRequest $request
     * @return RedirectResponse
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $object = new Faq($request->validated());
        $object->save();

        return to_route('superuser.faq.show', $object->id);
    }

    /**
     * @param Faq $faq
     * @return Application|Factory|View
     */
    public function show(Faq $faq): View|Factory|Application
    {
        return view('main.Superuser.Faq.show')
            ->with('faq', $faq);
    }

    /**
     * @param Faq $faq
     * @return Application|Factory|View
     */
    public function edit(Faq $faq): View|Factory|Application
    {
        return view('main.Superuser.Faq.edit')
            ->with('faq', $faq);
    }

    /**
     * @param UpdateRequest $request
     * @param Faq $faq
     * @return RedirectResponse
     */
    public function update(UpdateRequest $request, Faq $faq): RedirectResponse
    {
        $faq->update($request->validated());

        return to_route('superuser.faq.show', $faq->id);
    }

    /**
     * @param Request $request
     * @param Faq $faq
     * @return RedirectResponse
     */
    public function destroy(Request $request, Faq $faq): RedirectResponse
    {
        $faq->delete();

        return to_route('superuser.faq.index');
    }
}
