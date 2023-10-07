<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    { 
        if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->isAdmin()) {
            return $next($request);
        }

        return redirect('/admin_signin'); // Redirect to home or login page
    }

    
}