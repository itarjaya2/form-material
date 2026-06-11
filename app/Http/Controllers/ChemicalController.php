<?php

namespace App\Http\Controllers;

use App\Models\Chemical;
use Illuminate\Http\Request;

class ChemicalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chemical = Chemical::all();

        return view('chemical.index', compact('chemical'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('chemical.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $validated = $request->validate([
    'nama' => 'required|string',
    'jenis' => 'required|string',
    'material' => 'required|string',
    'panjang' => 'required|string',
    'lebar' => 'required|string',
    'tinggi' => 'required|string',
    'spesifikasi' => 'required|string',
    ]);

    $validated['nama'] = strtoupper($validated['nama']);
    $validated['jenis'] = strtoupper($validated['jenis']);
    $validated['material'] = strtoupper($validated['material']);
    $validated['spesifikasi'] = strtoupper($validated['spesifikasi']);
    // ambil data terakhir
    $lastChemical = Chemical::latest()->first();

    // pengkondisian
    // next number berisi => jika $lastChemical true maka +1 selain itu jadi 1
    $nextNumber = $lastChemical
    // ubah ke int agar bisa terbaca kemudian tambah 1
        ? ((int) substr($lastChemical->kode, 3)) + 1
        : 1;

    $validated['kode'] = 'CMH' . str_pad($nextNumber, 5, '0', STR_PAD_LEFT);

    Chemical::create($validated);

    return redirect()->route('chemical.index')
                     ->with('success', 'Data Chemical berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Chemical $chemical)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chemical $chemical)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chemical $chemical)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chemical $chemical)
    {
        //
    }
}
