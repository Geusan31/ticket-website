<?php

namespace App\Http\Controllers;

use App\Models\level;
use App\Models\penumpang;
use App\Models\petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        $levels = level::all();
        return view('auth.register', [
            'title' => 'Register',
            'levels' => $levels
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'role' => 'required'
        ]);
        $role = $request->input('role');
        if ($role == 'penumpang') {
            $result = $request->validate([
                'nama_penumpang' => 'required',
                'username_penumpang' => 'required|unique:penumpangs,username|min:3',
                'password_penumpang' => 'required|min:5',
                'alamat_penumpang' => 'required',
                'tanggal_lahir' => 'required|date',
                'jenis_kelamin' => 'required',
                'telephone' => 'required|numeric|min:10',
            ]);

            $result['username'] = $result['username_penumpang'];
            $result['password'] = Hash::make($result['password_penumpang']);

            penumpang::create($result);

            return redirect('/login');
        } else if ($role == 'petugas') {
            // dd($request->all());
            $result = $request->validate([
                'nama_petugas' => 'required',
                'username_petugas' => 'required|unique:petugas,username|min:3',
                'password_petugas' => 'required|min:5',
                'level_petugas' => 'required|exists:levels,id_level',
            ]);

            $result['username'] = $result['username_petugas'];
            $result['password'] = Hash::make($result['password_petugas']);
            $result['id_level'] = $result['level_petugas'];


            petugas::create($result);
            return redirect('/login');
        }
    }
}
