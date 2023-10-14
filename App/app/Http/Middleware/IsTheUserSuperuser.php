<?php

namespace App\Http\Middleware;

use App\Enums\User\SuperuserEnum;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsTheUserSuperuser
{
    /**
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): mixed
    {
        abort_if(!Auth::check(), 403, 'Forbidden.');
        abort_if(!Auth::user()->superuser->is(SuperuserEnum::Y), 403, 'Forbidden.');

        return $next($request);
    }
}
