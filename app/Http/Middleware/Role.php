<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // 1. Cek apakah user sudah login
        if (! auth()->check()) {
            return redirect('login');
        }

        // 2. Cek apakah role user sesuai dengan parameter yang diminta
        // Contoh: jika route pakai 'role:guru', maka variable $role akan berisi 'guru'
        if (auth()->user()->role !== $role) {
            abort(403, 'ANDA TIDAK MEMILIKI AKSES KE HALAMAN INI.');
        }

        return $next($request);
    }
}