<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\type_transportasi;

class getTypeTransportasi extends Controller
{
    public function getTypeTransportasi($transportasi) {
        $transportasiData = type_transportasi::where('nama_type', $transportasi)->get();

        if($transportasiData) {
            return response()->json($transportasiData);
        } else {
            return response()->json(['message', 'Transportasi tidak ditemukan'], 404);
        }
    }
}
