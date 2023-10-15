<?php

namespace App\Http\Controllers;

use App\Models\Type_transportasi;
use Illuminate\Http\Request;

class Type_TransportasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.type_transportasi.index', [
            'title' => 'Type Transportasi',
            'type_transportasis' => Type_transportasi::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.type_transportasi.create', [
            'title' => 'Create type transportasi',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $result = $request->validate([
            'nama_type' => 'required',
            'keterangan' => 'required',
        ]);

        Type_Transportasi::create($result);

        return redirect('/dashboard/type_transportasi')->with('success', 'Data berhasil di tambah');
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
