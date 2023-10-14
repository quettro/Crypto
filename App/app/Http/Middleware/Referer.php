<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Referer
{
    /**
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): mixed
    {
        if ($request->session()->has('referer') !== true && $request->header('referer')) {
            $request->session()->put('referer', $request->header('referer'));
        }
        return $next($request);
    }
}
