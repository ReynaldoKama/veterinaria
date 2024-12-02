<?php

namespace App\Http\Controllers;

use App\Models\Detail_Sale;
use Illuminate\Http\Request;

class DetailSaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $productos = $request->input('productos'); 
        $saleId = $request->input('sale_id'); 
        foreach ($productos as $producto) { 
            Detail_Sale::create([ 
                'quantity' => $producto['cantidad'], 
                'price' => 100.00, // Ajusta según el precio real 
                'sale_id' => $saleId, // Usa el ID de la venta creada 
                'product_id' => $producto['id'], 
            ]); 
        } 
        return redirect()->route('product.index')->with('success', 'Pago correcto.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Detail_Sale $detail_Sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Detail_Sale $detail_Sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Detail_Sale $detail_Sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Detail_Sale $detail_Sale)
    {
        //
    }
}
