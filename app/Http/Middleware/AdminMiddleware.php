<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth; // <-- INI YANG KURANG, WOK!

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // 1. Cek apakah sudah login
        if (!Auth::check()) {
            return redirect('/login');
        }

        // 2. Cek apakah rolenya admin
        // strtolower digunakan agar 'Admin' atau 'ADMIN' tetap terbaca 'admin'
        if (strtolower(Auth::user()->role) !== 'admin') {
            return redirect('/home')->with('error', 'Akses ditolak!');
        }

        return $next($request);
    }
}