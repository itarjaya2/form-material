<?php

namespace App\Http\Controllers;

use App\Models\docket;
use Illuminate\Http\Request;

class DocketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $docket = Docket::All();
        return view('docket.index', compact('docket'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('docket.create');
    }

    /**
     * Store a newly created resource in storage.
     * 
     */
    // request di kirim dari form yang
    // request => berisi data dari form
    public function store(Request $request)
    {
        // cek data yang ada di request
        $request->validate([
            'designnumber' => 'nullable',
            'source_type' => 'nullable',
            'label' => 'nullable',
            'jenis' => 'required',
            'bom_id' => 'nullable',
            'product' => 'required',
            'sap' => 'nullable',
        ]);

    $jenis = $request->jenis;
    $designnumber = empty($request->designnumber)
    ? '000000'
    : $request->designnumber;

    // Ambil data terakhir
    $lastDocket = Docket::latest('id')->first();

    $nomorUrut = $lastDocket ? $lastDocket->id + 1 : 1;

    // Format jadi 4 digit
    $nomorUrut = str_pad($nomorUrut, 4, '0', STR_PAD_LEFT);
    $code = $jenis . $designnumber . $nomorUrut;

    // simpan data kecuali token
    $data = $request->except('_token');
    // perbarui kode
    $data['code'] = $code;


    Docket::create($data);

        return redirect()
            ->route('docket.index')
            ->with('success', 'Docket berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(docket $docket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(docket $docket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, docket $docket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(docket $docket)
    {
        //
    }
}
