<?php

namespace App\Http\Middleware;

use App\Enums\User\StatusEnum;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsTheUserActive
{
    /**
     * @var string
     */
    public string $route = 'welcome';

    /**
     * @param Request $request
     * @param Closure $next
     * @return RedirectResponse|mixed
     */
    public function handle(Request $request, Closure $next): mixed
    {
        if (Auth::check()) {
            if (Auth::user()->status->isNot(StatusEnum::ACTIVE)) {
                Auth::logout();

                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return to_route($this->route);
            }
        }
        return $next($request);
    }
}
