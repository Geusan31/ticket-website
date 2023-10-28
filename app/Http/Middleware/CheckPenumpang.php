<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckPenumpang
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::guard('penumpang')->check()) {
            // Jika pengguna sudah login sebagai penumpang
            return $next($request);
        } else if (Auth::guard('petugas')->check()) {
            // Jika pengguna sudah login sebagai petugas
            return redirect('/#pemesanan')->with('alert', 'Anda bukan penumpang');
        } else {
            // Jika pengguna belum login
            return redirect('/login');
        }
    }
}
