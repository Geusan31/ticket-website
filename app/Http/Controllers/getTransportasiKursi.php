<?php

namespace App\Http\Controllers;

use App\Models\Transportasi;
use Illuminate\Http\Request;

class getTransportasiKursi extends Controller
{
    public function getTransportasi($id)
    {
        $transportasi = Transportasi::where('id_rute', $id)->get();

        return response()->json(['transportasis' => $transportasi]);
    }
}
