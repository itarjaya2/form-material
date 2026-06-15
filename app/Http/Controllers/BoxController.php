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
        'item' => 'required',
        'specs' => 'required',
        'panjang' => 'required',
        'lebar' => 'required',
        'tinggi' => 'required',
        'qty' => 'required',
        'unit' => 'required',
    ]);

    $validated['material'] = 'BOX';
    $validated['specs'] = strtoupper($validated['specs']);
    $validated['item'] = strtoupper($validated['item']);
    $validated['unit'] = strtoupper($validated['unit']);

    $materialCode = strtoupper($validated['material']) === 'BOX'
    ? 'BOX'
    : 'ERROR';

    $validated['code'] = $this->generateCode();

    Box::create($validated);

    return redirect()
        ->route('box.index')
        ->with('success', 'Data box berhasil ditambahkan');
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

    fgetcsv($file);
    
    $lastBox = Box::latest('id')->first();
    $nextNumber = $lastBox ? ((int) substr($lastBox->code, 3)) + 1 : 1;


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

        Box::create($data);
            $nextNumber++;
    }

    fclose($file);

    return redirect()
        ->route('box.index')
        ->with('success', 'Data box berhasil diimport');
    }

    private function generateCode()
    {
        $lastBox = Box::latest('id')->first();
        // tentukan nomor berikutnya
        // ambil nomor terakhir dari code, 
        // misal 'BOX00001' -> ambil '00001', lalu convert ke integer dan tambah 1
        $nextNumber = $lastBox
            ? ((int) substr($lastBox->code, 3)) + 1
            : 1;

        // generate code dengan prefix 'BOX' dan nomor 5 digit
        return 'BOX' . str_pad($nextNumber, 5, '0', STR_PAD_LEFT);
    }

}
