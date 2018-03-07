<?php

namespace App\Http\Middleware;

use Closure;

class CheckAgeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->age >= 20) {
            return $next($request);
        }

        return redirect()->back();
    }
}
