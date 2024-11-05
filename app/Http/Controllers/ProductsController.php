<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;

class ProductsController extends Controller
{
    protected $database;

    public function __construct()
    {
        $firebaseCredentials = env('FIREBASE_CREDENTIALS');
        
        if (!file_exists($firebaseCredentials)) {
            throw new \Exception("El archivo de credenciales de Firebase no se encuentra en la ruta especificada: {$firebaseCredentials}");
        }

        $factory = (new Factory)->withServiceAccount($firebaseCredentials);
        $this->database = $factory->withDatabaseUri('https://veterinaria-e77fe-default-rtdb.firebaseio.com/')->createDatabase();
    }

    public function index()
    {
        $productos = $this->database->getReference('productos')->getValue();
        return view('products.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'nombre' => 'REVALOR 200',
            'precio' => 10.50,
            'descripcion' => 'Caja de 10 cartuchos x 10 dosis',
            'stock' => 120,
            'imagen_url' => 'https://th.bing.com/th/id/OIP.5a6fGAapnltYCd-jLzTXPQHaE7?rs=1&pid=ImgDetMain',
            'activo' => true
        ];
    
        $this->database->getReference('productos')->push($data);
        return redirect()->back()->with('success', 'Producto añadido');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $producto = $this->database->getReference('productos/'.$id)->getValue();
        return view('productos.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->database->getReference('productos/'.$id)->remove();
        return redirect()->back()->with('success', 'Producto eliminado eliminado');
    }
}
