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
            'title' => 'Validate',
            'pemesanans' => Pemesanan::all(),
        ]);
    }

    public function print() {
        $pemesanan = Pemesanan::all();

        $pdf = FacadePdf::loadview('dashboard.laporan.laporan_pemesanan', ['pemesanans' => $pemesanan])->setPaper('A4', 'landscape');

        return $pdf->download('laporan_pemesanan.pdf');
    }
}
