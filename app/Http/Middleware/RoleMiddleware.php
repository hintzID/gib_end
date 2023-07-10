<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next, ...$roles)
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // Perform your role-based authorization logic here
            $userRole = $request->user()->peran->peran;

            if (in_array($userRole, $roles)) {
                return $next($request);
            }
        }

        return redirect('/login');
    }
}
