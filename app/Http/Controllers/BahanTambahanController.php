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

    $validated['material'] = 'BAHAN TAMBAHAN';
    $validated['specs'] = strtoupper($validated['specs']);
    $validated['item'] = strtoupper($validated['item']);
    $validated['unit'] = strtoupper($validated['unit']);

    $materialCode = strtoupper($validated['material']) === 'BAHAN TAMBAHAN'
    ? 'BHT'
    : 'ERROR';

    $validated['code'] = $this->generateCode();

    BahanTambahan::create($validated);

    return redirect()
        ->route('bahan-tambahan.index')
        ->with('success', 'Data box berhasil ditambahkan');
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
    $lastBahanTambahan = BahanTambahan::latest('id')->first();
    $nextNumber = $lastBahanTambahan ? ((int) substr($lastBahanTambahan->code, 3)) + 1 : 1;


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

        BahanTambahan::create($data);
            $nextNumber++;
    }

    fclose($file);

    return redirect()
        ->route('bahan-tambahan.index')
        ->with('success', 'Data Bahan Tambahan berhasil diimport');
    }

    private function generateCode()
    {
        $lastBahanTambahan = BahanTambahan::latest('id')->first();
        // tentukan nomor berikutnya
        // ambil nomor terakhir dari code, 
        // misal 'BOX00001' -> ambil '00001', lalu convert ke integer dan tambah 1
        $nextNumber = $lastBahanTambahan
            ? ((int) substr($lastBahanTambahan->code, 3)) + 1
            : 1;

        // generate code dengan prefix 'BOX' dan nomor 5 digit
        return 'BHT' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
    }
}
