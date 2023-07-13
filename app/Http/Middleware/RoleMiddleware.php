<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
{
    public function handle($request, Closure $next, ...$roles)
    {
        // Perform your role-based authorization logic here
        $userRole = $request->user()->peran->peran;
        if (in_array($userRole, $roles)) {
            return $next($request);
        }

        abort(403, 'Unauthorized');
    }
}
