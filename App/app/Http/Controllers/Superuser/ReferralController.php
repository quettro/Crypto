<?php

namespace App\Http\Controllers\Superuser;

use App\Http\Controllers\Controller;
use App\Http\Requests\Superuser\Referral\StoreRequest;
use App\Http\Requests\Superuser\Referral\UpdateRequest;
use App\Models\Referral;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ReferralController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        return view('main.Superuser.Referral.index')
            ->with('collection', Referral::query()->paginate(50));
    }

    /**
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('main.Superuser.Referral.create');
    }

    /**
     * @param StoreRequest $request
     * @return RedirectResponse
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $object = new Referral($request->validated());
        $object->save();

        return to_route('superuser.referral.show', $object->id);
    }

    /**
     * @param Referral $referral
     * @return Application|Factory|View
     */
    public function show(Referral $referral): View|Factory|Application
    {
        return view('main.Superuser.Referral.show')
            ->with('referral', $referral);
    }

    /**
     * @param Referral $referral
     * @return Application|Factory|View
     */
    public function edit(Referral $referral): View|Factory|Application
    {
        return view('main.Superuser.Referral.edit')
            ->with('referral', $referral);
    }

    /**
     * @param UpdateRequest $request
     * @param Referral $referral
     * @return RedirectResponse
     */
    public function update(UpdateRequest $request, Referral $referral): RedirectResponse
    {
        $referral->update($request->validated());

        return to_route('superuser.referral.show', $referral->id);
    }

    /**
     * @param Request $request
     * @param Referral $referral
     * @return RedirectResponse
     */
    public function destroy(Request $request, Referral $referral): RedirectResponse
    {
        $referral->delete();

        return to_route('superuser.referral.index');
    }
}
