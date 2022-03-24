<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PermissionMiddleware
{
    public function handle(Request $request, Closure $next, string $permission)
    {
        if (Auth::guest()) {
            return redirect('/login');
        }
        if (! $request->user()->can($permission)) {
            abort(403);
        }
        return $next($request);
    }
}
