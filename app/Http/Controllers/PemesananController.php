<?php

namespace App\Http\Controllers;

use App\Models\pemesanan;
use App\Models\Penumpang;
use App\Models\Petugas;
use App\Models\Rute;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class PemesananController extends Controller
{
    public function pesan(Request $request)
    {
        $result = $request->validate([
            'id_rute' => "required",
            'qty' => 'required',
            'tanggal_berangkat' => 'required',
        ]);


        $id_rute = Rute::find($result['id_rute']);
        $kodeTerbesar = Pemesanan::max('kode_pemesanan');
        $kodeBaru = str_pad($kodeTerbesar + 1, 3, '0', STR_PAD_LEFT);
        $totalBayar = $id_rute->harga;
        $tujuan = $id_rute->tujuan;
        $tanggal_berangkat = Carbon::parse($result['tanggal_berangkat']);
        $petugasIds = Petugas::pluck('id_petugas')->toArray();
        $randomPetugasId = $petugasIds[array_rand($petugasIds)];

        $jam_berangkat = $tanggal_berangkat->addHours();
        $jam_cekin = $tanggal_berangkat->addMinutes(30);

        $result['jam_berangkat'] = $jam_berangkat->format('H:i');
        $result['jam_cekin'] = $jam_cekin->format('H:i');

        $result['kode_pemesanan'] = $kodeBaru;
        $result['tanggal_pemesanan'] = Carbon::now()->format('Y-m-d');
        $result['harga'] = $result['qty'] * $id_rute->harga;
        $result['id_penumpang'] = Auth::guard('penumpang')->user()->id_penumpang;
        $result['id_transportasi'] = $request->id_transportasi;
        $result['kode_kursi'] = $request->id_transportasi;
        $result['total_bayar'] = $totalBayar;
        $result['tujuan'] = $tujuan;
        $result['id_petugas'] = $randomPetugasId;

        $pemesanan = pemesanan::create($result);
        // dd($pemesanan->penumpang->nama_penumpang);

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $pemesanan->id_pemesanan,
                'gross_amount' => $pemesanan->harga,
            ),
            'customer_details' => array(
                'nama_penumpang' => $pemesanan->penumpang->nama_penumpang,
                'username' => $pemesanan->penumpang->username,
                'alamat_penumpang' => $pemesanan->penumpang->alamat_penumpang,
                'tanggal_lahir' => $pemesanan->penumpang->tanggal_lahir,
                'jenis_kelamin' => $pemesanan->penumpang->jenis_kelamin,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        session()->put('snapToken', $snapToken);
        return redirect('/order')->with('pesanan', 'Pesanan telah dibuat');
    }

    public function update(Request $request, $id)
    {
        $pemesanan = pemesanan::find($id);
        $pemesanan->validate = $request->get('validate') == '2' ? 'success' : 'pending';
        $pemesanan->id_petugas = Auth::guard('petugas')->user()->id_petugas;
        $pemesanan->save();

        return back();
    }
}
