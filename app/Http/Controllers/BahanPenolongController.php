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
        'item' => 'required',
        'specs' => 'required',
        'panjang' => 'required',
        'lebar' => 'required',
        'tinggi' => 'required',
        'qty' => 'required',
        'unit' => 'required',
    ]);

    $validated['material'] = 'BHP';
    $validated['specs'] = strtoupper($validated['specs']);
    $validated['item'] = strtoupper($validated['item']);
    $validated['unit'] = strtoupper($validated['unit']);

    $materialCode = strtoupper($validated['material']) === 'BHP'
    ? 'BHP'
    : 'ERROR';

    // ambil data tinta terakhir
    $lastTinta = BahanPenolong::latest('id')->first();

    // tentukan nomor berikutnya
    $nextNumber = $lastTinta
        ? ((int) substr($lastTinta->code, 3)) + 1
        : 1;

    // generate code
    $validated['code'] =  $materialCode .
        str_pad($nextNumber, 4, '0', STR_PAD_LEFT);

    BahanPenolong::create($validated);

    return redirect()
        ->route('bahan-penolong.index')
        ->with('success', 'Data box berhasil ditambahkan');
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
