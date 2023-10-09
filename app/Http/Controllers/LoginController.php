<?php

namespace App\Http\Controllers;

use App\Models\Penumpang;
use App\Models\Petugas;
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
            session(['role' => 'penumpang']);

            // set is_logged_in true
            $penumpang = Penumpang::find(Auth::id());
            $penumpang->is_logged_in = true;
            $penumpang->save();

            return redirect()->intended('/');
        } else if (Auth::guard('petugas')->attempt($result)) {
            $request->session()->regenerate();
            session(['role' => 'petugas']);

            // set is_logged_in true
            $petugas = Petugas::find(Auth::guard('petugas')->id());
            $petugas->is_logged_in = true;
            $petugas->save();


            return redirect()->intended('/');
        }

        return back()->with('loginError', 'Login failed');
    }

    public function logout(Request $request): RedirectResponse
    {
        if (Auth::guard('penumpang')->check()) {
            $penumpang = Penumpang::find(Auth::id());
            $penumpang->is_logged_in = false;
            $penumpang->save();
        }

        if (Auth::guard('petugas')->check()) {
            $petugas = Petugas::find(Auth::id());
            $petugas->is_logged_in = false;
            $petugas->save();
        }

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
