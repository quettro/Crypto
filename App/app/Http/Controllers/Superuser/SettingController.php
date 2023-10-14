<?php

namespace App\Http\Controllers\Superuser;

use App\Http\Controllers\Controller;
use App\Http\Requests\Superuser\Setting\UpdateRequest;
use App\Models\Setting;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class SettingController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function show(): View|Factory|Application
    {
        return view('main.Superuser.Setting.show')
            ->with('setting', Setting::default());
    }

    /**
     * @return Application|Factory|View
     */
    public function edit(): View|Factory|Application
    {
        return view('main.Superuser.Setting.edit')
            ->with('setting', Setting::default());
    }

    /**
     * @param UpdateRequest $request
     * @return RedirectResponse
     */
    public function update(UpdateRequest $request): RedirectResponse
    {
        $setting = Setting::default();
        $setting->update($request->validated());

        return to_route('superuser.setting.show');
    }
}
