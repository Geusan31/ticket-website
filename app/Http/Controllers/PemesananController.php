<?php

namespace App\Http\Controllers;

use App\Models\pemesanan;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    public function pesan(Request $request)
    {
        $kodeTerbesar = Pemesanan::max('kode_pemesanan');
        $kodeBaru = str_pad($kodeTerbesar + 1, 3, '0', STR_PAD_LEFT);
    }

    public function update(Request $request, $id)
    {
        $pemesanan = pemesanan::find($id);
        $pemesanan->validate = $request->get('validate') == '2' ? 'success' : 'pending';
        $pemesanan->save();

        return back();
    }
}
