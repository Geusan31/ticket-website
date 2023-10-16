<?php

namespace App\Http\Controllers;

use App\Models\pemesanan;
use App\Models\Penumpang;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class PemesananController extends Controller
{
    public function pesan(Request $request)
    {
        $kodeTerbesar = Pemesanan::max('kode_pemesanan');
        $kodeBaru = str_pad($kodeTerbesar + 1, 3, '0', STR_PAD_LEFT);
        
        $result = $request->validate([
            'kode_kursi' => "required",
            'id_rute' => "required",
            'tujuan' => 'required',
            'tanggal_berangkat' => 'required',
            'jam_cekin' => 'required',
            'jam_berangkat' => 'required',
            'total_bayar' => 'required',
        ]);

        $result['kode_pemesanan'] = $kodeBaru;
        $result['tanggal_pemesanan'] = Carbon::now()->format('Y-m-d');
        $result['id_pelanggan'] = Auth::guard('penumpang')->user()->id_penumpang;
    }

    public function update(Request $request, $id)
    {
        $pemesanan = pemesanan::find($id);
        $pemesanan->validate = $request->get('validate') == '2' ? 'success' : 'pending';
        $pemesanan->save();

        return back();
    }
}
