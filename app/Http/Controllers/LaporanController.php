<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Barryvdh\DomPDF\Facade as PDF;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $pemesananSuccess = Pemesanan::where('validate', 'success')->get();
        $subtotal = $pemesananSuccess->sum(function ($order) {
            return $order->rute->harga;
        });
        $pajak = 1000;
        $total = $subtotal + $pajak;
        return view('dashboard.laporan.index', [
            'title' => 'Laporan',
            'pemesanans' => $pemesananSuccess,
            'total' => $total
        ]);
    }

    public function print()
    {
        $pemesanan = Pemesanan::where('validate', 'success')->get();

        $subtotal = $pemesanan->sum(function ($order) {
            return $order->rute->harga;
        });
        $pajak = 1000;
        $total = $subtotal + $pajak;

        $pdf = FacadePdf::loadview('dashboard.laporan.laporan_pemesanan_1', [
            'pemesanans' => $pemesanan,
            'total' => $total,
            'tanggal_pemesanan' => Carbon::now()->format('d/m/Y'),
        ])->setPaper('A4', 'landscape');

        return $pdf->download('laporan_pemesanan.pdf');
    }
}
