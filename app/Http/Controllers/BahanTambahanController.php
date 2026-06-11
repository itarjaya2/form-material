<?php

namespace App\Http\Controllers;

use App\Models\BahanTambahan;
use Illuminate\Http\Request;

class BahanTambahanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $bahanTambahan = BahanTambahan::all();

        return view('bahanTambahan.index', compact('bahanTambahan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bahanTambahan.create');
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
    $lastBahanTambahan = BahanTambahan::latest()->first();

    // pengkondisian
    // next number berisi => jika $lastBox true maka +1 selain itu jadi 1
    $nextNumber = $lastBahanTambahan
    // ubah ke int agar bisa terbaca kemudian tambah 1
        ? ((int) substr($lastBahanTambahan->kode, 3)) + 1
        : 1;

    $validated['kode'] = 'BHT' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);

    BahanTambahan::create($validated);

    return redirect()->route('bahan-tambahan.index')
                     ->with('success', 'Data Bahan Tambahan berhasil ditambahkan');
    }


    /**
     * Display the specified resource.
     */
    public function show(bahanTambahan $bahanTambahan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(bahanTambahan $bahanTambahan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, bahanTambahan $bahanTambahan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(bahanTambahan $bahanTambahan)
    {
        //
    }
}
