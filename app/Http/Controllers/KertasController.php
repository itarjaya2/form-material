<?php

namespace App\Http\Controllers;

use App\Models\Kertas;
use Illuminate\Http\Request;


class KertasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // mengambil semua data kertas dari database dan mengirimkannya ke view kertas.blade.php
    public function index()
    {
        //
        // mengambil semua data kertas dari database
        $kertas = Kertas::all();
        return view('kertas.index', compact('kertas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // hanya mengarahkan ke halaman create-kertas.blade.php
    public function create()
    {
        //
        return view('kertas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validasi data pertama, pastikan semua field diisi
        // validasi data yang dikirimkan dari form, pastikan semua field diisi
    $validated = $request->validate([
            'nama' => 'required',
            'jenis' => 'required',
            'material' => 'required',
            'panjang' => 'required',
            'lebar' => 'required',
            'gramasi' => 'required',
            'spesifikasi' => 'required',
        ]);
   
    // convert ke uppercase    
    $validated['nama'] = strtoupper($validated['nama']);
    $validated['jenis'] = strtoupper($validated['jenis']);
    $validated['material'] = strtoupper($validated['material']);
    $validated['spesifikasi'] = strtoupper($validated['spesifikasi']);

    // kode berisi dari func generate kode
    $validated['kode'] = $this->generateKode($validated);

    // setelah itu simpan ke db

        Kertas::create($validated);

        return redirect()
            ->route('kertas.index')
            ->with('success', 'Data kertas berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kertas $kertas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kertas $kertas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kertas $kertas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kertas = Kertas::findOrFail($id);

        $kertas->delete();

        return redirect()->route('kertas.index')
                        ->with('success', 'Data berhasil dihapus');
    }


    // function import excel
    public function import(Request $request)
    {
    $request->validate([
        'excel' => 'required|mimes:csv,txt'
    ]);

    $file = fopen(
        $request->file('excel')->getRealPath(),
        'r'
    );

    // Skip header
    fgetcsv($file);

    while (($row = fgetcsv($file, 1000, ',')) !== false) {

        // Skip baris kosong
        if (empty($row[0])) {
            continue;
        }

        $data = [
            'nama'        => strtoupper(trim($row[0])),
            'jenis'       => strtoupper(trim($row[1])),
            'material'    => strtoupper(trim($row[2])),
            'gramasi'     => trim($row[3]),
            'panjang'     => trim($row[4]),
            'lebar'       => trim($row[5]),
            'spesifikasi' => strtoupper(trim($row[6])),

        ];

        // Generate kode
        $data['kode'] = $this->generateKode($data);

        Kertas::create($data);
    }

    fclose($file);

    return redirect()
        ->route('kertas.index')
        ->with('success', 'Data CSV berhasil diimport.');
    }

    // function generate kode
    private function generateKode(array $data)
    {
        $namaKode = [
            'DPC' => 'DP',
            'IVORY' => 'IV',
            'GOLDEN GLOSS' => 'GG',
            'ART PAPER' => 'AP',
            'ART CARTON' => 'AC',
            'CUP STOCK' => 'CS',
            'CUPSTOCK' => 'CS',
            'ART PAPER 1 SIDE' => 'AS',
            'PDC' => 'PD',
            'PSC' => 'PS',
            'TWO PACK' => 'TP',
            // new
            'EXTRU' => 'EX',
            'FOOPACK' => 'FP',
            'HVS' => 'HV',
            // 'YELLOW BOARD' => 'YB',
            // 'YELLOWBOARD' => 'YB',
            'AMBRI' => 'AM'
        ];

        $nama = strtoupper($data['nama']);
        $namaCode = 'ERROR';

        foreach ($namaKode as $keyword => $code) {
            if (str_contains($nama, $keyword)) {
                $namaCode = $code;
                break;
            }
        }

        $panjangCode = $data['panjang'] == '0'
            ? 'L000'
            : str_pad($data['panjang'] * 10, 4, '0', STR_PAD_LEFT);

        $lebarCode = str_pad(
            $data['lebar'] * 10,4,'0',STR_PAD_LEFT);

        $materialCode = 'KRT';

        return
            $materialCode .
            $namaCode .
            $data['gramasi'] .
            $panjangCode .
            $lebarCode;
    }
    

}
