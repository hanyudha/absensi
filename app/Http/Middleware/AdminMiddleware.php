<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Pastikan ini diimpor

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        // Memeriksa apakah pengguna yang login adalah admin
        if (Auth::check() && Auth::user()->role_as == 'admin') {
            return $next($request); // Lanjutkan jika pengguna admin
        }

        return redirect('/'); // Jika bukan admin, redirect ke halaman utama
    }
}
