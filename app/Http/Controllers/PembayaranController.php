<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index() {
        return redirect('/order')->with('success', 'Pembayaran berhasil');
    }
}
