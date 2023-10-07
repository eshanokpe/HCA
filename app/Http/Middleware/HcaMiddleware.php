<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HcaMiddleware
{
    public function handle(Request $request, Closure $next)
{
    if (Auth::guard('hca')->check() && Auth::guard('hca')->user()->isHca()) {
        return $next($request);
    }

    return redirect('/'); // Redirect to home or login page
}
}