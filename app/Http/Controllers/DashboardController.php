<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\Penumpang;
use App\Models\Petugas;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Penumpang
        $total_penumpang = Penumpang::all()->count();
        $penumpangAktif = Penumpang::where('is_logged_in', true)->count();

        $persentase_penumpang = $penumpangAktif / $total_penumpang * 100;

        // Petugas
        $total_petugas = Petugas::all()->count();
        $petugasAktif = Petugas::where('is_logged_in', true)->count();

        $persentase_petugas = $petugasAktif / $total_petugas * 100;
        
        // Pemesanan

        return view('dashboard.index', [
            'title' => 'Dashboard',
            'penumpangs' => Penumpang::all(),
            'petugas' => Petugas::all(),
            'penumpang_count' => Penumpang::all()->count(),
            'petugas_count' => Petugas::all()->count(),
            'pemesanan_count' => Pemesanan::all()->count(),
            'persentase_penumpang' => $persentase_penumpang,
            'persentase_petugas' => $persentase_petugas
        ]);
    }
}
