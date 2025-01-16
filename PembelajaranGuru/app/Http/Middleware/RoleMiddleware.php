<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (!Auth::check() || !Auth::user()->hasRole($role)) {
            // Jika peran pengguna tidak sesuai, redirect ke halaman yang sesuai
            return redirect('/home'); // Ganti dengan halaman yang sesuai
        }

        return $next($request);
    }
}
