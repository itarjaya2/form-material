<?php

namespace App\Http\Controllers;

use App\Models\DeliveryOrder;
use Illuminate\Http\Request;

class DeliveryOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $deliveryOrder = DeliveryOrder::all();
        return view('deliveryOrder.index', compact('deliveryOrder'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('deliveryOrder.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $validated = $request->validate([
        'ekspedisi' => 'required',
        'no_polisi' => 'required',
        'barang' => 'required',
        'catatan' => 'nullable',
    ]);

    $validated['ekspedisi'] = strtoupper($validated['ekspedisi']);
    $validated['no_polisi'] = strtoupper($validated['no_polisi']);
    $validated['barang'] = strtoupper($validated['barang']);


    $validated['code'] = $this->generateCode($validated['ekspedisi']);

    DeliveryOrder::create($validated);

    return redirect()
        ->route('delivery-order.index')
        ->with('success', 'Delivery Order berhasil');
    }

    /**
     * Display the specified resource.
     */
    public function show(DeliveryOrder $deliveryOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DeliveryOrder $deliveryOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DeliveryOrder $deliveryOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeliveryOrder $deliveryOrder)
    {
        //
    }
    

    private function generateCode($ekspedisi)
    {
    $today = today();

    // Cek apakah ekspedisi ini sudah punya nomor hari ini
    $existing = DeliveryOrder::where('ekspedisi', $ekspedisi)
        ->whereDate('created_at', $today)
        ->first();

   if ($existing) {

    $parts = explode('/', $existing->code);
    $number = explode('.', $parts[1]);
    $sequence = (int) $number[1];

    } else {

        $last = DeliveryOrder::whereDate('created_at', $today)
            ->latest('id')
            ->first();

        if ($last) {

            $parts = explode('/', $last->code);
            $number = explode('.', $parts[1]);
            $sequence = (int) $number[1] + 1;

        } else {

            $sequence = 1;

        }
    }

    $code = now()->format('m')
            . '/' 
            . now()->format('d') 
            . '.'
            . str_pad($sequence, 4, '0', STR_PAD_LEFT)
            . '/'
            . now()->year;

    return $code;
    
    
}
}
