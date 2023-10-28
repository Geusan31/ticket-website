<?php

namespace App\Http\Controllers;

use App\Models\Type_transportasi;
use Illuminate\Http\Request;

class getTransportasiController extends Controller
{
    public function getTransportasi($id) {
        $transportasi = Type_transportasi::where('id_type_transportasi', $id)->first();
        // dump($transportasi);
        return response()->json($transportasi);
    }
}
