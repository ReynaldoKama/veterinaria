<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categorias = Category::all();
        $busqueda = $request->busqueda;
        $categoriaId = $request->categoria_id;
        $productos = Product::query();
        if ($busqueda) {
            $productos = Product::where('name', 'LIKE', '%' . $busqueda . '%');
        }

        if ($categoriaId) { 
            $productos = $productos->where('category_id', $categoriaId); 
        }
        
        $productos = $productos->get();
        if ($productos->isEmpty()) {
            $productos = Product::all();
        }
        return view('products.index', compact('productos', 'categorias'));
    }

    // public function index()
    // {
    //     $productos = Product::all();
    //     $categorias = Category::all();
    //     return view('products.index', compact('productos', 'categorias'));
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Valida los datos del formulario
    $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
        'presentation' => 'required|string',
        'specifications' => 'nullable|string',
        'description' => 'nullable|string',
        'stock' => 'required|integer|min:0',
        'image_url' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validar el archivo de imagen
        'categoria' => 'required|integer'
    ]);

    $imagePath = null;
    // Manejar la carga de la imagen
    if ($request->hasFile('image_url')) {
        // Obtener el archivo de la solicitud
        $image = $request->file('image_url');
        // Asignar un nombre único a la imagen
        $imageName = time() . '_' . $image->getClientOriginalName();
        // Guardar la imagen en 'public/images/productos' y obtener la ruta
        $imagePath = $image->storeAs('images/productos', $imageName, 'public');
        // La ruta pública que se almacenará en la base de datos
        $imagePath = 'storage/' . $imagePath;
    }


    // Reemplazar saltos de línea con '\n' en las especificaciones y descripción 
    $specifications = str_replace(PHP_EOL, '\n', $request->input('specifications'));
    $description = str_replace(PHP_EOL, '\n', $request->input('description'));
    // Crear el producto y guardar en la base de datos
    Product::create([
        'name' => $request->input('name'),
        'price' => $request->input('price'),
        'presentation' => $request->input('presentation'),
        'specifications' => $specifications,
        'description' => $description,
        'stock' => $request->input('stock'),
        'image_url' => $imagePath, // Guardar la ruta de la imagen en la base de datos
        'admin_id' => 1, // Obtener el ID del usuario autenticado
        'category_id' => $request->input('categoria'), // Ajusta esto según tu lógica
    ]);

    // Redirigir con un mensaje de éxito
    return redirect()->route('product.index')->with('success', 'Producto creado correctamente');
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
    public function edit(Request $request, $id)
    {
        $producto = Product::find($id);
        $producto->specifications = str_replace('\n', PHP_EOL, $producto->specifications);
        $producto->description = str_replace('\n', PHP_EOL, $producto->description);
        $categories = Category::all();
        
        return view('products.edit', compact('producto', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Valida los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'presentation' => 'required|string',
            'specifications' => 'nullable|string',
            'description' => 'nullable|string',
            'stock' => 'required|integer|min:0',
            'categoria' => 'required|integer'
        ]);
        $producto = Product::findOrFail($id);
        $imagePath = $producto->image_url;
        
        // Manejar la carga de la imagen
        if ($request->hasFile('image_url')) {

            // Eliminar la imagen anterior si existe 
            if ($producto->image_url && file_exists(public_path($producto->image_url))) { 
                unlink(public_path($producto->image_url)); 
            }
            // Obtener el archivo de la solicitud
            $image = $request->file('image_url');
            // Asignar un nombre único a la imagen
            $imageName = time() . '_' . $image->getClientOriginalName();
            // Guardar la imagen en 'public/images/productos' y obtener la ruta
            $imagePath = $image->storeAs('images/productos', $imageName, 'public');
            // La ruta pública que se almacenará en la base de datos
            $imagePath = 'storage/' . $imagePath;
        }

        // Reemplazar saltos de línea con '\n' en las especificaciones y descripción 
        $specifications = str_replace(PHP_EOL, '\n', $request->input('specifications'));
        $description = str_replace(PHP_EOL, '\n', $request->input('description'));
        // Crear el producto y guardar en la base de datos
        
        
        $producto->update([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'presentation' => $request->input('presentation'),
            'specifications' => $specifications,
            'description' => $description,
            'stock' => $request->input('stock'),
            'image_url' => $imagePath, // Guardar la ruta de la imagen en la base de datos
            'category_id' => $request->input('categoria'), // Ajusta esto según tu lógica
        ]);
    
        return redirect()->route('product.index')->with('success', 'Producto actualizado correctamente.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy( string $id)
    {
        $producto = Product::findOrFail($id);
        $producto->delete();

        return redirect()->route('product.index')->with('success', 'Producto eliminado correctamente.');
    
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
