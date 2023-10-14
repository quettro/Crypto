<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LastActivity
{
    /**
     * Последняя активность пользователя. Важно, необходимо обновлять поле `last_activity_at`, не затрагивая поле `updated_at`.
     *
     * @param Request $request
     * @param Closure $next
     * @return RedirectResponse|mixed
     */
    public function handle(Request $request, Closure $next): mixed
    {
        $user = $request->user();

        if ($user !== null) {
            $user->timestamps = false;
            $user->last_activity_at = now();
            $user->save();
        }

        return $next($request);
    }
}
