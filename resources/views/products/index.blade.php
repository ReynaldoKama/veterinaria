@extends('layouts.dashboard')

@section('content')
    <h1>Productos</h1>
    <link rel="stylesheet" href="{{ asset('css/productos.css') }}">

    <div class="container">
        <div class="row">
            <!-- Producto 1 -->
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm product-card">
                    <img src="{{ asset('images/Productos/REVALOR-200.jpg') }}" alt="Revalor 200" style="height: 200px">
                    <div class="card-body">
                        <h5 class="card-title product-title">REVALOR 200</h5>
                        <p class="card-text product-description">Caja de 10 cartuchos x 10 dosis.</p>
                        <div class="product-details">
                            <span>20 bs</span>
                            <a href="#" class="btn btn-sm btn-outline-secondary view-product">Ver producto</a>
                            <button class="btn btn-sm btn-outline-primary add-to-cart" data-product="REVALOR 200">Agregar al carrito</button>
                        </div>
                    </div>
                </div>
            </div>
    
            <!-- Producto 2 -->
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm product-card">
                    <img src="{{ asset('images/Productos/mastijetForte.jpeg') }}" alt="majistijet forte" style="height: 200px">
                    <div class="card-body">
                        <h5 class="card-title product-title">MASTIJET FORTE</h5>
                        <p class="card-text product-description">Caja con 20 jeringas.</p>
                        <div class="product-details">
                            <span>20 bs</span>
                            <a href="#" class="btn btn-sm btn-outline-secondary view-product">Ver producto</a>
                            <button class="btn btn-sm btn-outline-primary add-to-cart" data-product="MASTIJET FORTE">Agregar al carrito</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        // Script para funcionalidad del carrito
        document.querySelectorAll('.add-to-cart').forEach(button => {
            button.addEventListener('click', function() {
                let product = this.getAttribute('data-product');
                alert(product + " ha sido agregado al carrito.");
                // Aquí puedes agregar la lógica para agregar al carrito
            });
        });
    
        // Funcionalidad del botón "Ver producto"
        document.querySelectorAll('.view-product').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                // Aquí rediriges a una página de detalle del producto
                alert("Redirigiendo a la página del producto.");
                // window.location.href = "/producto-detalle/" + productoID;  // Simulación
            });
        });
    </script>
@endsection