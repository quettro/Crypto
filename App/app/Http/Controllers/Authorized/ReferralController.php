<?php

namespace App\Http\Controllers\Authorized;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class ReferralController extends Controller
{
    /**
     * @return Factory|View|Application
     */
    public function index(): Factory|View|Application
    {
        return view('main.Authorized.Referral.index')
            ->with('collection', Auth::user()->referralHasMany()->with(['referral'])->paginate());
    }
}
