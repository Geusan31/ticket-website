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

}
