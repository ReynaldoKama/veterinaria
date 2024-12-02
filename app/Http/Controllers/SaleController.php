<?php

namespace App\Http\Controllers;

use App\Models\Detail_Sale;
use App\Models\Product;
use App\Models\Sale;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SaleController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    public function pagar(Request $request)
    {
        try {
            $total = $request->input('total');
            $fecha = $request->input('fecha');
            $detalles = $request->input('detalles');

            // Crear la venta
            $sale = new Sale();
            $sale->sale_date = Carbon::parse($fecha);
            $sale->total = $total;
            $sale->user_id = 1;
            
            $sale->save();

            // Crear los detalles de la venta
            foreach ($detalles as $detalle) {
                
                $detailsSale = new Detail_Sale();
                $detailsSale->quantity = $detalle['cantidad'];
                $detailsSale->price = $detalle['precio'];
                $detailsSale->sale_id = $sale->id;
                $detailsSale->product_id = $detalle['id_producto'];
                $detailsSale->save();

                // Actualizar el stock del producto 
                $producto = Product::find($detalle['id_producto']); 
                if ($producto) { 
                    $producto->stock -= $detalle['cantidad']; 
                    $producto->save(); 
                }
            }


            return response()->json(['success' => true, 'redirect' => route('product.index')]);
        } catch (\Exception $e) { 
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500); 
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Sale $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sale $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sale $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sale $cart)
    {
        //
    }
}
