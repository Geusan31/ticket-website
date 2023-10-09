<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class CheckPetugas
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        Log::info('Inside cekPetugas middleware'); // tambahkan ini

        if (Auth::guard('petugas')->check()) {
            Log::info('Petugas is logged in'); // tambahkan ini
            return $next($request);
        }

        Log::info('Petugas is not logged in'); // tambahkan ini
        return redirect('/'); // atau halaman error
    }
}
