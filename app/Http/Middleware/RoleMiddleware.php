<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
{
    public function handle($request, Closure $next, $role)
    {
        // Perform your role-based authorization logic here
        if ($request->user()->peran->peran === $role) {
            return $next($request);
        }

        abort(403, 'Unauthorized');
    }
}
