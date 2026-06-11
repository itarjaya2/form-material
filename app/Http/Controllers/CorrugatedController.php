<?php

namespace App\Http\Controllers;

use App\Models\Corrugated;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;


class CorrugatedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $corrugated = Corrugated::all();
        return view('corrugated.index', compact('corrugated'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('corrugated.create');
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
    {
    $validated = $request->validate([
        'nama' => 'required',
        'jenis' => 'required',
        'material' => 'required',
        'panjang' => 'required',
        'lebar' => 'required',
        'gramasi' => 'required',
        'spesifikasi' => 'required',
    ]);

    $validated['nama'] = strtoupper($validated['nama']);
    $validated['jenis'] = strtoupper($validated['jenis']);
    $validated['material'] = strtoupper($validated['material']);
    $validated['spesifikasi'] = strtoupper($validated['spesifikasi']);

    $validated['kode'] = $this->generateKode($validated);

    Corrugated::create($validated);

    return redirect()
        ->route('corrugated.index')
        ->with('success', 'Data kertas berhasil disimpan.');
    }
    /**
     * Display the specified resource.
     */
    public function show(Corrugated $corrugated)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Corrugated $corrugated)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Corrugated $corrugated)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Corrugated $corrugated)
    {
        //
    }

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

        Corrugated::create($data);
    }

    fclose($file);

    return redirect()
        ->route('corrugated.index')
        ->with('success', 'Data CSV berhasil diimport.');
    }


    private function generateKode(array $data)
    {
    $jenisMap = [
        'SINGLE FACE' => 'SF',
        'SHEET' => 'SH',
    ];

    $jenisCode = 'OT';

    foreach ($jenisMap as $keyword => $code) {
        if (str_contains(strtoupper($data['jenis']), $keyword)) {
            $jenisCode = $code;
            break;
        }
    }

    $materialCode = 'COR';

    $existing = Corrugated::where('spesifikasi',strtoupper($data['spesifikasi']))->first();

    if ($existing) {
        $spesifikasiCode = substr($existing->kode, 5, 3);
    } else {
        $lastCode = Corrugated::latest('id')->first();

        $nextNumber = $lastCode
            ? ((int) substr($lastCode->kode, 5, 3)) + 1
            : 1;

        $spesifikasiCode = str_pad($nextNumber, 3, '0', STR_PAD_LEFT);
    }

    $panjangCode = str_pad($data['panjang'] * 10, 4, '0', STR_PAD_LEFT);
    $lebarCode = str_pad($data['lebar'] * 10, 4, '0', STR_PAD_LEFT);

    return $materialCode .
           $jenisCode .
           $spesifikasiCode .
           $panjangCode .
           $lebarCode;
    }

}
