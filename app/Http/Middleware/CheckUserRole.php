<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        return $next($request);
        // Pastikan pengguna sudah terautentikasi dan memiliki role 'user'
        if (auth()->check() && auth()->user()->role_as === 'user') {
            return $next($request);
        }
        
        return redirect()->route('login')->with('error', 'Anda tidak memiliki akses.');
    }
}

    

