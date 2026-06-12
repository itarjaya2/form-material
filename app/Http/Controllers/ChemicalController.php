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
        'item' => 'required',
        'specs' => 'required',
        'qty' => 'required',
        'unit' => 'required',
    ]);

    $validated['material'] = 'CHEMICAL';
    $validated['item'] = strtoupper($validated['item']);
    $validated['specs'] = strtoupper($validated['specs']);
    $validated['unit'] = strtoupper($validated['unit']);

    $materialCode = strtoupper($validated['material']) === 'CHEMICAL'
    ? 'CHM'
    : 'ERROR';

    // ambil data tinta terakhir
    $lastTinta = Chemical::latest('id')->first();

    // tentukan nomor berikutnya
    $nextNumber = $lastTinta
        ? ((int) substr($lastTinta->code, 3)) + 1
        : 1;

    // generate code
    $validated['code'] =  $materialCode .
        str_pad($nextNumber, 5, '0', STR_PAD_LEFT);

    Chemical::create($validated);

    return redirect()
        ->route('chemical.index')
        ->with('success', 'Data tinta berhasil ditambahkan');
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
