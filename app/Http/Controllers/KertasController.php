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
            'item' => 'required',//ivori 350
            'jenis' => 'required',//ivory,dpc
            'bentuk' => 'required',//sheet/roll
            'gramasi' => 'required',
            'panjang' => 'required',
            'lebar' => 'required',
            'specs' => 'required',
            'qty' => 'required',
            'unit' => 'required',
        ]);
   
    // convert ke uppercase    
    $validated['item'] = strtoupper($validated['item']);
    $validated['jenis'] = strtoupper($validated['jenis']);
    $validated['specs'] = strtoupper($validated['specs']);
    $validated['unit'] = strtoupper($validated['unit']);
    $validated['material'] = 'KERTAS';

    // kode berisi dari func generate kode
    $validated['code'] = $this->generateCode($validated);

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

    // skip baris kosong
    if (empty(array_filter($row))) {
        continue;
    }

        if (count($row) < 10) {
        continue;
    }

        $data = [
            'item'        => strtoupper(trim($row[0])),
            'jenis'       => strtoupper(trim($row[1])),
            'material'    => strtoupper(trim($row[2])),
            'bentuk'    => strtoupper(trim($row[3])),
            'gramasi'     => trim($row[4]),
            'panjang'     => trim($row[5]),
            'lebar'       => trim($row[6]),
            'specs' => strtoupper(trim($row[7])),
            'qty'       => trim($row[8]),
            'unit'     => strtoupper(trim($row[9])),
        ];

        // Generate kode
        $data['code'] = $this->generateCode($data);

        Kertas::create($data);
    }

    fclose($file);

    return redirect()
        ->route('kertas.index')
        ->with('success', 'Data CSV berhasil diimport.');
    }

    // function generate kode
    private function generateCode(array $data)
    {
        
        // ini adalah jenis
        $jenisItem = [
            'WHITEKRAFT' => 'WK',
            'WHITE KRAFT' => 'WK',
            'ART PAPER ONE SIDE' => 'AS',
            'DPC' => 'DP',
            'IVORY' => 'IV',
            'GOLDEN GLOSS' => 'GG',
            'ART PAPER' => 'AP',
            'ART CARTON' => 'AC',
            'CUP STOCK' => 'CS',
            'CUPSTOCK' => 'CS',
            
            'PDC' => 'PD',
            'PSC' => 'PS',
            'TWO PACK' => 'TP',
            // new
            'FOOPACK' => 'FP',
            'KRAFT' => 'KR',
            'EXTRU' => 'EX',
            'DC COSEL' => 'DC',
            'METALIZED BOARD' => 'MD',
            
            'YELLOWBOARD' => 'YB',
            'YELLOW BOARD' => 'YB',
            'AKASIA' => 'AK',
            'AMBRI' => 'AM',
            'ART CARTON ONE SIDE' => 'AC',
            'TRIPLEX BOARD' => 'TB',
            'WPC' => 'WP',
            'CDWB' => 'CD',
            'HVS' => 'HV',
            'ONE SIDE' => 'OS',
            
            'DPNC' => 'DN',
            'GREY BOARD' => 'RB',
            'EMBOSS BOARD' => 'EB',
            'LINEN EMBOSS' => 'LE',
        ];

        $jenis = strtoupper($data['jenis']);
        $jenisCode = 'ERROR';

        // cek dan sesuaikan input dengan daftar kode
        foreach ($jenisItem as $keyword => $code) {
            if (str_contains($jenis, $keyword)) {
                $jenisCode = $code;
                break;
            }
        }

        // ambil dari bentuk 
        // jika bentuk roll maka jadi L000
        // jika bukan roll ambil panjang
        $panjangCode = strtoupper($data['bentuk']) === 'ROLL'
        ? 'L000'
        : str_pad(
            (int) ($data['panjang'] * 10),
            4,
            '0',
            STR_PAD_LEFT
        );

        $lebarCode = str_pad(
            $data['lebar'] * 10,4,'0',STR_PAD_LEFT);

        // validasi material code
        $materialCode = strtoupper($data['material']) === 'KERTAS'
        ? 'KRT'
        : 'ERROR';

        return
            $materialCode .
            $jenisCode .
            $data['gramasi'] .
            $panjangCode .
            $lebarCode;
    }
    

}
