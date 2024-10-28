@extends('layouts.dashboard')

@section('content')
    <h1 class="text-center">Tienda de Productos</h1>
    <link rel="stylesheet" href="{{ asset('css/productos.css') }}">

    <!-- Contenedor principal -->
    <div class="container mt-4">
        <div class="row">
            <!-- Categorías -->
            <div class="col-md-3">
                <div class="categorias mb-4">
                    <h5 class="categorias-title">Categorías</h5>
                    <ul class="list-group">
                        <li class="list-group-item"><a href="#">Anabólicos</a></li>
                        <li class="list-group-item"><a href="#">Antibióticos</a></li>
                        <li class="list-group-item"><a href="#">Antiinflamatorios</a></li>
                        <li class="list-group-item"><a href="#">Antiparasitarios</a></li>
                        <li class="list-group-item"><a href="#">Hormonales</a></li>
                        <li class="list-group-item"><a href="#">Vitaminas y minerales</a></li>
                    </ul>
                </div>
            </div>

            <!-- Listado de productos y buscador -->
            <div class="col-md-9">
                <div class="d-flex justify-content-between mb-3">
                    <!-- Buscador -->
                    <div class="input-group search-bar">
                        <input type="text" class="form-control" placeholder="Buscar...">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                    
                    <!-- Filtro de orden -->
                    <div class="filter">
                        <select class="form-control">
                            <option>Ordenar</option>
                            <option>Precio</option>
                            <option>Nombre</option>
                        </select>
                    </div>
                </div>

                <!-- Listado de productos -->
                <div class="row">
                    <!-- Producto 1 -->
                    <div class="col-md-4 mb-4">
                        <div class="card product-card shadow-sm">
                            <img src="{{ asset('images/Productos/REVALOR-200.jpg') }}" alt="Revalor 200" class="card-img-top product-image">
                            <div class="card-body">
                                <h5 class="card-title">REVALOR 200</h5>
                                <p class="card-text">Caja de 10 cartuchos x 10 dosis.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span>20 bs</span>
                                    <a href="#" class="btn btn-primary">Ver producto</a>
                                </div>
                                <button class="btn btn-success btn-block mt-2">Añadir al carrito</button>
                            </div>
                        </div>
                    </div>

                    <!-- Producto 2 -->
                    <div class="col-md-4 mb-4">
                        <div class="card product-card shadow-sm">
                            <img src="{{ asset('images/Productos/mastijetForte.jpeg') }}" alt="Mastijet Forte" class="card-img-top product-image">
                            <div class="card-body">
                                <h5 class="card-title">MASTIJET FORTE</h5>
                                <p class="card-text">Caja con 20 jeringas.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span>20 bs</span>
                                    <a href="#" class="btn btn-primary">Ver producto</a>
                                </div>
                                <button class="btn btn-success btn-block mt-2">Añadir al carrito</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
