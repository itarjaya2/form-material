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
        'item' => 'required',
        'jenis' => 'required',
        'gramasi' => 'required',
        'panjang' => 'required',
        'lebar' => 'required',
        'specs' => 'required',
        'qty' => 'required',
        'unit' => 'required',
    ]);

    $validated['item'] = strtoupper($validated['item']);
    $validated['jenis'] = strtoupper($validated['jenis']);
    $validated['specs'] = strtoupper($validated['specs']);
    $validated['unit'] = strtoupper($validated['unit']);
    $validated['material'] = 'CORRUGATED';


    $validated['code'] = $this->generateCode($validated);

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

        // 
        if (count($row) < 9) {
        continue;
    }
        $data = [
            // input nama diisi oleh excel dari row 0
            'item'        => strtoupper(trim($row[0])),
            'jenis'       => strtoupper(trim($row[1])),
            'material' => 'CORRUGATED',
            'gramasi'     => trim($row[3]),
            'panjang'     => trim($row[4]),
            'lebar'       => trim($row[5]),
            'specs' => strtoupper(trim($row[6])),
            'qty'       => trim($row[7]),
            'unit'        => strtoupper(trim($row[8])),
        ];

        // Generate kode
        $data['code'] = $this->generateCode($data);

        Corrugated::create($data);
    }

    fclose($file);

    return redirect()
        ->route('corrugated.index')
        ->with('success', 'Data CSV berhasil diimport.');
    }


    private function generateCode(array $data)
    {

    $jenis = str_replace(' ', '', strtoupper($data['jenis']));

    $jenisMap = [
        'SINGLE FACE' => 'SF',
        'SINGLEFACE' => 'SF',
        'SHEET' => 'SH',
    ];

    // NILAI DEFAULT
    $jenisCode = $jenisMap[$jenis] ?? 'ERROR';

    foreach ($jenisMap as $keyword => $code) {
        if (str_contains(strtoupper($data['jenis']), $keyword)) {
            $jenisCode = $code;
            break;
        }
    }

    // validasi material code
        $materialCode = strtoupper($data['material']) === 'CORRUGATED'
        ? 'COR'
        : 'ERROR';

        // cek data yang ada
    $existing = Corrugated::where('specs',strtoupper($data['specs']))->first();

    if ($existing) {
        $specsCode = substr($existing->code, 5, 3);
    } else {
        // ambil nomor specs terbesar yang pernah dipakai
        $maxSpecsCode = Corrugated::all()
        ->map(function ($item) {
            return (int) substr($item->code, 5, 3);
        })
        ->max();

        $nextNumber = ($maxSpecsCode ?? 0) + 1;

    $specsCode = str_pad($nextNumber, 3, '0', STR_PAD_LEFT);
    }

    $panjangCode = str_pad($data['panjang'] * 10, 4, '0', STR_PAD_LEFT);
    $lebarCode = str_pad($data['lebar'] * 10, 4, '0', STR_PAD_LEFT);

    return $materialCode .
           $jenisCode .
           $specsCode .
           $panjangCode .
           $lebarCode;
    }

}
