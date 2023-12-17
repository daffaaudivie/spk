<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nilai;
use App\Models\Kriteria;
use App\Models\Alternatif;


class NILAIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $nilai = Nilai::all()->groupBy('id_alternatif');
    $alternatif = Alternatif::all(); // Replace Alternatif with your actual model name
    $kriteria = Kriteria::all(); // Replace Kriteria with your actual model name
    


    // Return the view
    return view('nilai.nilai', compact('nilai', 'alternatif', 'kriteria'));
}



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('nilai.nilai_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nilai' => 'required',
        ]);

        Nilai::create([
            'nilai' => $request->nilai,
        ]);

        return redirect()->route('nilai.index')->with('success', 'Berhasil Menyimpan Data');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $Nilai = Nilai::findOrFail($id);

        return view('nilai.nilai_edit', compact('Nilai'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nilai' => 'required',
        ]);

        $Nilai = Nilai::findOrFail($id);

        $Nilai->update([
            'nilai' => $request->nilai,
        ]);

        return redirect()->route('nilai.index')->with('success', 'Berhasil Mengupdate Data');
    }
    public function destroy($id)
    {
    $nilai = Nilai::findOrFail($id);
    $nilai->delete();

    return redirect()->route('nilai.index')->with('success', 'Berhasil Menghapus Data');
    }

    // ... other methods ...
}
