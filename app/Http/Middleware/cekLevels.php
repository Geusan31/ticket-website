<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class cekLevels
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $level): Response
    {
         // Cek apakah petugas sudah login
         if (Auth::guard('petugas')->check()) {
             // Cek apakah level petugas sesuai dengan parameter
             if (Auth::guard('petugas')->user()->id_level == $level) {
                return response("ANDA LEVEL $level");
                // Lanjutkan request ke aplikasi
                return $next($request);
            }
        }
        return redirect('/');
    }
}
