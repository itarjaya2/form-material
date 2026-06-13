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

    $validated['material'] = 'Bahan Penolong';
    $validated['specs'] = strtoupper($validated['specs']);
    $validated['item'] = strtoupper($validated['item']);
    $validated['unit'] = strtoupper($validated['unit']);

    $materialCode = strtoupper($validated['material']) === 'BAHAN PENOLONG'
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
    $lastBahanPenolong = BahanPenolong::latest('id')->first();
    $nextNumber = $lastBahanPenolong ? ((int) substr($lastBahanPenolong->code, 3)) + 1 : 1;


    while (($row = fgetcsv($file, 1000, ',')) !== false) {

        if (count($row) < 8) {
            continue;
        }

        $data = [
            'code'     => $this->generateCode(),
            'item'     => strtoupper(trim($row[0])),
            'material' => strtoupper(trim($row[1])),   
            'specs'    => strtoupper(trim($row[2])),
            'panjang'  => trim($row[3]),
            'lebar'    => trim($row[4]),
            'tinggi'   => trim($row[5]),
            'qty'      => trim($row[6]),
            'unit'     => strtoupper(trim($row[7])),
        ];

        BahanPenolong::create($data);
            $nextNumber++;
    }

    fclose($file);

    return redirect()
        ->route('bahan-penolong.index')
        ->with('success', 'Data Bahan Penolong berhasil diimport');
    }

    private function generateCode()
    {
        $lastBahanPenolong = BahanPenolong::latest('id')->first();
        // tentukan nomor berikutnya
        // ambil nomor terakhir dari code, 
        // misal 'BOX00001' -> ambil '00001', lalu convert ke integer dan tambah 1
        $nextNumber = $lastBahanPenolong
            ? ((int) substr($lastBahanPenolong->code, 3)) + 1
            : 1;

        // generate code dengan prefix 'BOX' dan nomor 5 digit
        return 'BHP' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
    }
}
