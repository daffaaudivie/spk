<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alternatif;

class ALTERNATIFController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alternatif = Alternatif::all();
        return view('alternatif.alternatif', compact('alternatif'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('alternatif.alternatif_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_alternatif' => 'required',
        ]);

        Alternatif::create([
            'nama_alternatif' => $request->nama_alternatif,
        ]);

        return redirect()->route('alternatif.index')->with('success', 'Berhasil Menyimpan Data');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $Alternatif = Alternatif::findOrFail($id);

        return view('alternatif.alternatif_edit', compact('Alternatif'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_alternatif' => 'required',
        ]);

        $Alternatif = Alternatif::findOrFail($id);

        $Alternatif->update([
            'nama_alternatif' => $request->nama_alternatif,
        ]);

        return redirect()->route('alternatif.index')->with('success', 'Berhasil Mengupdate Data');
    }
    public function destroy($id)
    {
    $alternatif = Alternatif::findOrFail($id);
    $alternatif->delete();

    return redirect()->route('alternatif.index')->with('success', 'Berhasil Menghapus Data');
    }

    // ... other methods ...
}
