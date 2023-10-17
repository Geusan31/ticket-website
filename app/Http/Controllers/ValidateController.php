<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pemesanan;
use Illuminate\Support\Facades\Auth;

class ValidateController extends Controller
{
    public function index() {
        $id_petugas = Auth::guard('petugas')->user()->id_petugas;
        $pemesanans = Pemesanan::with('penumpang')->where('id_petugas', $id_petugas)->get();
        dd($pemesanans->penumpang);
        return view('dashboard.validate.index', [
            'title' => 'Validate',
            'pemesanans' => $pemesanans,
        ]);
    }
}
