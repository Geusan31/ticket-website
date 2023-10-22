<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Barryvdh\DomPDF\Facade as PDF;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index() {
        return view('dashboard.laporan.index', [
            'title' => 'Laporan',
            'pemesanans' => Pemesanan::where('validate', 'success')->get(),
        ]);
    }

    public function print() {
        $pemesanan = Pemesanan::where('validate', 'success')->get();

        $pdf = FacadePdf::loadview('dashboard.laporan.laporan_pemesanan', ['pemesanans' => $pemesanan])->setPaper('A4', 'landscape');

        return $pdf->download('laporan_pemesanan.pdf');
    }
}
