<?php

namespace App\Http\Controllers\Superuser;

use App\Http\Controllers\Controller;
use App\Http\Requests\Superuser\Ip\StoreRequest;
use App\Http\Requests\Superuser\Ip\UpdateRequest;
use App\Models\Ip;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class IpController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        return view('main.Superuser.Ip.index')
            ->with('collection', Ip::query()->paginate(50));
    }

    /**
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('main.Superuser.Ip.create');
    }

    /**
     * @param StoreRequest $request
     * @return RedirectResponse
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $object = new Ip($request->validated());
        $object->save();

        return to_route('superuser.ip.show', $object->id);
    }

    /**
     * @param Ip $ip
     * @return Application|Factory|View
     */
    public function show(Ip $ip): View|Factory|Application
    {
        return view('main.Superuser.Ip.show')
            ->with('ip', $ip);
    }

    /**
     * @param Ip $ip
     * @return Application|Factory|View
     */
    public function edit(Ip $ip): View|Factory|Application
    {
        return view('main.Superuser.Ip.edit')
            ->with('ip', $ip);
    }

    /**
     * @param UpdateRequest $request
     * @param Ip $ip
     * @return RedirectResponse
     */
    public function update(UpdateRequest $request, Ip $ip): RedirectResponse
    {
        $ip->update($request->validated());

        return to_route('superuser.ip.show', $ip->id);
    }

    /**
     * @param Request $request
     * @param Ip $ip
     * @return RedirectResponse
     */
    public function destroy(Request $request, Ip $ip): RedirectResponse
    {
        $ip->delete();

        return to_route('superuser.ip.index');
    }
}
