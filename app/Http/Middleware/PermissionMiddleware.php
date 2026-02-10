<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Spatie\Permission\Exceptions\UnauthorizedException;

class PermissionMiddleware
{
    public function handle(Request $request, Closure $next, $permission, $guard = null)
    {
        $authGuard = app('auth')->guard($guard);

        if ($authGuard->guest()) {
            return redirect()->route('login');
        }

        $permissions = is_array($permission)
            ? $permission
            : explode('|', $permission);

        foreach ($permissions as $permission) {
            if ($authGuard->user()->hasPermissionTo($permission, $guard)) {
                return $next($request);
            }
        }

        if ($authGuard->user()->hasRole('admin')) {
            return redirect()->route('dashboard');
        }

        return redirect()->route('vacations.index')->with('error', 'You do not have the required permissions.');
    }
}

