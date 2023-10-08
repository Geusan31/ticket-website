<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login', [
            'title' => 'Login',
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $result = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::guard('penumpang')->attempt($result)) {
            $request->session()->regenerate();
            // session(['role' => 'petugas']);
            session(['role' => 'penumpang']);

            return redirect()->intended('/');
        } else if (Auth::guard('petugas')->attempt($result)) {
            $request->session()->regenerate();
            // session(['role' => 'penumpang']);
            session(['role' => 'petugas']);

            return redirect()->intended('/');
        }

        return back()->with('loginError', 'Login failed');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
