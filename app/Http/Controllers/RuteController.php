<?php

namespace App\Http\Controllers;

use App\Models\Rute;
use App\Models\Type_transportasi;
use Illuminate\Http\Request;

class RuteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $rutes = Rute::all();
        // foreach ($rutes as $rute) {
        //     dd($rute->type_transportasi);
        // }
        return view('dashboard.rute.index', [
            'title' => 'Rute',
            'rutes' => Rute::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $usedRoutes = Rute::pluck('id_type_transportasi');

        $availableRoutes = Type_transportasi::whereNotIn('id_type_transportasi', $usedRoutes)->get();

        return view('dashboard.rute.create', [
            'title' => 'Create Rute',
            'rutes' => $availableRoutes
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $result = $request->validate([
            'id_type_transportasi' => 'required',
            'tujuan' => 'required',
            'rute_awal' => 'required',
            'rute_akhir' => 'required',
            'harga' => 'required',
        ]);

        Rute::create($result);

        return redirect('/dashboard/rute')->with('success', 'Data berhasil di tambah');
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
