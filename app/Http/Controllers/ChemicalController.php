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

    $validated['code'] = $this->generateCode();

    Chemical::create($validated);

    return redirect()
        ->route('chemical.index')
        ->with('success', 'Data chemical berhasil ditambahkan');
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

    public function import(Request $request)
    {
    //   dd($request->file('excel'));
    $request->validate([
        'excel' => 'required|mimes:csv,txt'
    ]);

    $file = fopen(
        $request->file('excel')->getRealPath(),
        'r'
    );

    // skip header
    fgetcsv($file);
     $lastChemical = Chemical::latest('id')->first();
    $nextNumber = $lastChemical ? ((int) substr($lastChemical->code, 3)) + 1 : 1;


    while (($row = fgetcsv($file, 1000, ',')) !== false) {

        if (count($row) < 5) {
            continue;
        }

        $data = [
            'code'     => $this->generateCode(),
            'item'     => strtoupper(trim($row[0])),
            'material' => strtoupper(trim($row[1])),   
            'specs'    => strtoupper(trim($row[2])),
            'qty'      => trim($row[3]),
            'unit'     => strtoupper(trim($row[4])),
        ];

        Chemical::create($data);
            $nextNumber++;
    }

    fclose($file);

    return redirect()
        ->route('chemical.index')
        ->with('success', 'Data chemical berhasil diimport');
    }

    private function generateCode()
    {
        $lastChemical = Chemical::latest('id')->first();

        $nextNumber = $lastChemical
            ? ((int) substr($lastChemical->code, 3)) + 1
            : 1;

        // generate code dengan prefix 'CHM' dan nomor 5 digit
        return 'CHM' . str_pad($nextNumber, 5, '0', STR_PAD_LEFT);
    }
}
