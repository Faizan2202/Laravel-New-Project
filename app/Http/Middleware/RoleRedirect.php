<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleRedirect
{

    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();

            if ($user->hasRole('admin')) {
                return redirect('/admin/dashboard');
            }

            if ($user->hasRole('user')) {
                return redirect('/user/dashboard');
            }
        }

        return $next($request);
    }
}
