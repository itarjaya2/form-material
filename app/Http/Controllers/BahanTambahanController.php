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

    /**
     * Store a newly created resource in storage.
     */
     public function store(Request $request)
    {
    $validated = $request->validate([
        'item' => 'required',
        'specs' => 'required',
        'panjang' => 'required',
        'lebar' => 'required',
        'tinggi' => 'required',
        'qty' => 'required',
        'unit' => 'required',
    ]);

    $validated['material'] = 'BHT';
    $validated['specs'] = strtoupper($validated['specs']);
    $validated['item'] = strtoupper($validated['item']);
    $validated['unit'] = strtoupper($validated['unit']);

    $materialCode = strtoupper($validated['material']) === 'BHT'
    ? 'BHT'
    : 'ERROR';

    // ambil data tinta terakhir
    $lastTinta = BahanTambahan::latest('id')->first();

    // tentukan nomor berikutnya
    $nextNumber = $lastTinta
        ? ((int) substr($lastTinta->code, 3)) + 1
        : 1;

    // generate code
    $validated['code'] =  $materialCode .
        str_pad($nextNumber, 4, '0', STR_PAD_LEFT);

    BahanTambahan::create($validated);

    return redirect()
        ->route('bahan-tambahan.index')
        ->with('success', 'Data bahan tambahan berhasil ditambahkan');
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
