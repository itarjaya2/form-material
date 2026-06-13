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
        'item' => 'required',
        'specs' => 'required',
        'qty' => 'required',
        'unit' => 'required',
    ]);

    $validated['material'] = 'TINTA';
    $validated['item'] = strtoupper($validated['item']);
    $validated['specs'] = strtoupper($validated['specs']);
    $validated['unit'] = strtoupper($validated['unit']);

    $validated['code'] = $this->generateCode();

    Tinta::create($validated);

    return redirect()
        ->route('tinta.index')
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
    // 1. Ambil data terakhir SATU KALI sebelum looping untuk modal awal increment
        $lastTinta = Tinta::latest('id')->first();
        $nextNumber = $lastTinta ? ((int) substr($lastTinta->code, 3)) + 1 : 1;

    while (($row = fgetcsv($file, 1000, ',')) !== false) {

        if (count($row) < 5) {
            continue;
        }

        $data = [
            'code'     => $this->generateCode(),
            'item'     => strtoupper(trim($row[0])),
            'material' => strtoupper(trim($row[1])),
            'specs'    => trim($row[2]),
            'qty'      => trim($row[3]),
            'unit'     => strtoupper(trim($row[4])),
        ];

        Tinta::create($data);
        // 4. Tambahkan nomor untuk baris CSV berikutnya
        $nextNumber++;
    }

    fclose($file);

    return redirect()
        ->route('tinta.index')
        ->with('success', 'Data tinta berhasil diimport');
    }

    private function generateCode()
    {
        $lastTinta = Tinta::latest('id')->first();

        $nextNumber = $lastTinta
            ? ((int) substr($lastTinta->code, 3)) + 1
            : 1;

        return 'INK' . str_pad($nextNumber, 5, '0', STR_PAD_LEFT);
    }



}
