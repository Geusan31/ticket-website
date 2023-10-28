<?php

namespace App\Http\Controllers;

use App\Models\Rute;
use App\Models\Transportasi;
use Illuminate\Http\Request;

class TransportasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // foreach (Transportasi::all() as $transpor) {
        //     dump($transpor->rute);
        //     foreach ($transpor->rute as $rute) {
        //         dump($rute->rute_awal, $rute->rute_akhir);
        //     }
        // }
        return view('dashboard.transportasi.index', [
            'title' => 'Transportasi',
            'transportasi' => Transportasi::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $usedRoutes = Transportasi::pluck('id_rute');

        $availableRoutes = Rute::whereNotIn('id_rute', $usedRoutes)->get();
        
        return view('dashboard.transportasi.create', [
            'title' => 'Transportasi Create',
            'transportasis' => Transportasi::all(),
            'rutes' => $availableRoutes
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $result = $request->validate([
            'kode' => 'required|unique:transportasis',
            'jumlah_kursi' => 'required',
            'id_rute' => 'required',
            'id_type_transportasi' => 'required',
        ]);

        Transportasi::create($result);

        return redirect('/dashboard/transportasi')->with('success', 'Data berhasil di tambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
