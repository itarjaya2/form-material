<?php

namespace App\Http\Controllers;

use App\Models\Tinta;
use Illuminate\Http\Request;

class TintaController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $tintas = Tinta::all();

        return view('tinta.index', compact('tintas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tinta.create');
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
    $lastTinta = Tinta::latest()->first();

    // pengkondisian
    // next number berisi => jika $lastTinta true maka +1 selain itu jadi 1
    $nextNumber = $lastTinta
    // ubah ke int agar bisa terbaca kemudian tambah 1
        ? ((int) substr($lastTinta->kode, 3)) + 1
        : 1;

    $validated['kode'] = 'INK' . str_pad($nextNumber, 5, '0', STR_PAD_LEFT);

    Tinta::create($validated);

    return redirect()->route('tinta.index')
                     ->with('success', 'Data tinta berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tinta $tinta)
    {
        // return view('tinta.show', compact('tinta'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tinta $tinta)
    {
        // return view('tinta.edit', compact('tinta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tinta $tinta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tinta = Tinta::findOrFail($id);
        $tinta->delete();

        return redirect()->route('tinta.index')
                        ->with('success', 'Data tinta berhasil dihapus');
    }
}
