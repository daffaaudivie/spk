<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria;

class KRITERIAController extends Controller
{
    public function index()
    {
        $kriteria = Kriteria::all();
        return view('kriteria.kriteria', compact('kriteria'));
    }
    public function create()
    {
        return view('kriteria.kriteria_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kriteria' => 'required',
        ]);

        Kriteria::create([
            'nama_kriteria' => $request->nama_kriteria,
        ]);

        return redirect()->route('kriteria.index')->with('success', 'Berhasil Menyimpan Data');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $Kriteria = Kriteria::findOrFail($id);

        return view('kriteria.kriteria_edit', compact('Kriteria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kriteria' => 'required',
        ]);

        $Kriteria = Kriteria::findOrFail($id);

        $Kriteria->update([
            'nama_kriteria' => $request->nama_kriteria,
        ]);

        return redirect()->route('kriteria.index')->with('success', 'Berhasil Mengupdate Data');
    }
    public function destroy($id)
    {
    $kriteria = Kriteria::findOrFail($id);
    $kriteria->delete();

    return redirect()->route('kriteria.index')->with('success', 'Berhasil Menghapus Data');
    }
}
