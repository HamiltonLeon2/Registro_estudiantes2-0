<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $role, $permission = null)
    {
        if (!Auth::check()){
            return redirect('/login');
        }

        $user = Auth::user();

        if ($user->hasRole($role)) {
            if ($permission !==null && ! 
            $user->can($permission)) {
                abort(403);
            }
            return $next($request);
        }
        abort(403);
    }
}
