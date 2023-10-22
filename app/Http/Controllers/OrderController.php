<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index() {
        $id_penumpang = Auth::guard('penumpang')->user()->id_penumpang;
        $orders = Pemesanan::where('id_penumpang', $id_penumpang)->get();

        $subtotal = $orders->sum(function ($order) {
            return $order->harga;
        });

        $pajak = 1000;

        $total = $subtotal + $pajak;

        return view('order.index', [
            'title' => "My Order",
            'orders' => $orders,
            'subtotal' => $subtotal,
            'pajak' => $pajak,
            'total' => $total,
        ]);
    }
}
