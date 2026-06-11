<?php

namespace App\Http\Controllers;

use App\Models\Box;
use Illuminate\Http\Request;

class BoxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $box = Box::all();

        return view('box.index', compact('box'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('box.create');
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
    $lastBox = Box::latest()->first();

    // pengkondisian
    // next number berisi => jika $lastBox true maka +1 selain itu jadi 1
    $nextNumber = $lastBox
    // ubah ke int agar bisa terbaca kemudian tambah 1
        ? ((int) substr($lastBox->kode, 3)) + 1
        : 1;

    $validated['kode'] = 'BOX' . str_pad($nextNumber, 5, '0', STR_PAD_LEFT);

    Box::create($validated);

    return redirect()->route('box.index')
                     ->with('success', 'Data Box berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Box $box)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Box $box)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Box $box)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Box $box)
    {
        //
    }
}
