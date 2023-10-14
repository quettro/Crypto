<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Referral
{
    /**
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): mixed
    {
        $referral_program_parameter = setting()->referral_program_parameter;

        if ($request->session()->has('referral') !== true && $request->has($referral_program_parameter))
            $request->session()->put('referral', $request->get($referral_program_parameter));

        return $next($request);
    }
}
