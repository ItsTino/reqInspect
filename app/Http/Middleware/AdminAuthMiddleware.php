<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminAuthMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->session()->get('admin_password') !== config('admin.password')) {
            return redirect()->route('admin.login');
        }

        return $next($request);
    }
}
