<?php

namespace App\Http\Controllers;

use App\Models\Rute;
use Illuminate\Http\Request;
use App\Models\type_transportasi;

class getTypeTransportasi extends Controller
{
    public function getTypeTransportasi($transportasi)
    {
        $types = type_transportasi::where('nama_type', $transportasi)->get();

        $rutes = collect();
        foreach ($types as $type) {
            $rute = Rute::where('id_type_transportasi', $type->id_type_transportasi)->get();
            $rutes = $rutes->concat($rute);
        }

        return response()->json($rutes);
    }

    public function getType($rute_awal, $rute_akhir)
    {
        // Cari rute berdasarkan rute_awal dan rute_akhir
        $rute = Rute::where('rute_awal', $rute_awal)
            ->where('rute_akhir', $rute_akhir)
            ->first();

        // Jika rute tidak ditemukan, kembalikan pesan error
        if (!$rute) {
            return response()->json([
                'error' => 'Rute tidak ditemukan.',
            ], 404);
        }

        // Ambil type_transportasi dari rute
        $type_transportasi = $rute->type_transportasi;

        // Kembalikan id_type_transportasi dan keterangan sebagai response JSON
        return response()->json([
            'id_type_transportasi' => $type_transportasi->id_type_transportasi,
            'keterangan' => $type_transportasi->keterangan,
        ]);
    }
}
