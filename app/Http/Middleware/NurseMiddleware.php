<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NurseMiddleware
{
    public function handle(Request $request, Closure $next)
{
    if (Auth::guard('nurse')->check() && Auth::guard('nurse')->user()->isNurse()) {
        return $next($request);
    }

    return redirect('/'); // Redirect to home or login page
}
}