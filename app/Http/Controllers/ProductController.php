<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Product::all();
        return view('products.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'presentation' => 'required|string',
            'specifications' => 'nullable|string',
            'description' => 'nullable|string',
            'stock' => 'required|integer|min:0',
            'image_url' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        
        // Manejar la carga de la imagen
        if ($request->hasFile('image_url')) {
            // Subir la imagen al directorio public
            $imagePath = $request->file('image_url')->store('productos', 'public');
        }
        #Product::create($request->all());
         // Crear el producto
        Product::create([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'presentation' => $request->input('presentation'),
            'specifications' => $request->input('specifications'),
            'description' => $request->input('description'),
            'stock' => $request->input('stock'),
            'image_url' => $imagePath,
            'category_id' => 1,
        ]);

        return redirect()->route('product.index')->with('success', 'Producto creado Correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $producto)
    {
        return view('product.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $producto)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'presentation' => 'required|string',
            'specifications' => 'nullable|string',
            'description' => 'nullable|string',
            'stock' => 'required|integer|min:0',
            'image_url' => 'required|nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        
            // Procesar la nueva imagen, si existe
        if ($request->hasFile('image')) {
            // Eliminar la imagen anterior si existe
            if ($producto->image_url) {
                Storage::disk('public')->delete($producto->image_url);
            }
            $producto->image_url = $request->file('image')->store('products', 'public');
        }
        $producto->update($request->except('image') + ['image_url' => $producto->image_url]);
    
        return redirect()->route('products.index')->with('success', 'Producto actualizado correctamente.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $producto)
    {
        $producto->delete();

        return redirect()->route('products.index')->with('success', 'Producto eliminado correctamente.');
    
    }
    public function addToCart(Request $request, $id)
    {
        // Obtener el producto de Firebase usando el ID
        $producto = Product::find($id);
        
        //Verificar si el produccto existe
        if (!$producto) {
            return response()->json(['error' => 'Producto no encontrado'], 404);
        }
        // Obtener la cantidad del producto del request (valor predeterminado: 1)
        $cantidad = $request->input('cantidad', 1);

        // Añadir el producto al carrito en la sesión
        $carrito = Session::get('carrito', []);
        if (isset($carrito[$id])) {
            $carrito[$id]['cantidad'] += $cantidad;
        } else {
            $carrito[$id] = [
                'nombre' => $producto['nombre'],
                'precio' => $producto['precio'],
                'cantidad' => $cantidad,
            ];
        }

        Session::put('carrito', $carrito);

        // Calcular el total de productos y precio total
        $totalProductos = array_sum(array_column($carrito, 'cantidad'));
        $totalPrecio = array_sum(array_map(function($item) {
            return $item['precio'] * $item['cantidad'];
        }, $carrito));

        return response()->json([
            'totalProductos' => $totalProductos,
            'totalPrecio' => $totalPrecio,
        ]);
    }
}
