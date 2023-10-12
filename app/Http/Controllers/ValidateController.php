<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pemesanan;

class ValidateController extends Controller
{
    public function index() {
        return view('dashboard.validate.index', [
            'title' => 'Validate',
            'pemesanans' => pemesanan::all(),
        ]);
    }
}
