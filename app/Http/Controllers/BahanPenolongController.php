<?php

namespace App\Http\Controllers;

use App\Models\BahanPenolong;
use Illuminate\Http\Request;

class BahanPenolongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $bahanPenolong = BahanPenolong::all();

        return view('bahanPenolong.index', compact('bahanPenolong'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bahanPenolong.create');
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
    $lastBahanPenolong = BahanPenolong::latest()->first();

    // pengkondisian
    // next number berisi => jika $lastBox true maka +1 selain itu jadi 1
    $nextNumber = $lastBahanPenolong
    // ubah ke int agar bisa terbaca kemudian tambah 1
        ? ((int) substr($lastBahanPenolong->kode, 3)) + 1
        : 1;

    $validated['kode'] = 'BHP' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);

    BahanPenolong::create($validated);

    return redirect()->route('bahan-penolong.index')
                     ->with('success', 'Data Bahan Penolong berhasil ditambahkan');
    }


    /**
     * Display the specified resource.
     */
    public function show(BahanPenolong $bahanPenolong)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BahanPenolong $bahanPenolong)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BahanPenolong $bahanPenolong)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BahanPenolong $bahanPenolong)
    {
        //
    }
}
