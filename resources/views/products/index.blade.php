@extends('layouts.dashboard')

@section('content')
    <div class="contenido-productos">
        <div class="productos-izquierda">
            <div class="cotizador-productos">
                <h3 class="titulos-izquierda">Cotizador de productos</h3>
                <div class="datos-izquierda">
                    <div class="contenido-cotizador">
                        <img src="images/productos/carrito.png" alt="carrito">
                        <p>Productos agregados</p>
                        <div class="cantidad-productos">
                            <p id="total-productos">0</p>
                        </div>   
                    </div>
                    <div id="carrito-contenido">
                    </div>
                    <div class="total-suma-container">
                        <div class="display-total">
                            <p>Total: <span id="total-suma">0 Bs</span></p> <!-- Muestra la sumatoria total al final -->
                            <button id="pagar-btn" class="btn-si btn-ver-producto" onclick="pagar()" style="display:none;">Pagar</button>
                        </div>
                    </div>
                </div>
            </div>{{-- cotizador productos --}}
            <div class="categoria-productos">
                <h3 class="titulos-izquierda">Categorias</h3>
                <div class="datos-izquierda">
                    <nav class="navegacion-categorias">
                        <ul>
                            @foreach ($categorias as $categoria)
                                <li><a class="a-categoria" href="{{ route('product.index', ['categoria_id' => $categoria->id]) }}"><p class="p-categoria">{{ $categoria->name }}</p></a></li>
                            @endforeach
                        </ul>
                    </nav>
                </div>
            </div>{{-- cotizador productos --}}
        </div>{{-- productos izquierda --}}
        <div class="productos-derecha">
            <div class="productos-agregar">
                <h2 class="titulo-productos">Todos los Productos</h2>
                @can('admin.products.create')
                    <a href="{{route('product.create')}}" class="btn-add-producto"><p>Agregar productos</p></a>
                @endcan
                
            </div>
            <div class="productos-busqueda">
                <div>
                    <form class="buscador-text" action="{{route('product.index')}}" method="GET">
                        <input class="input-buscar" type="search" name="busqueda" placeholder="Buscar productos">
                        <button type="submit"><img src="images/productos/search.png" alt="buscar"></button>
                    </form>
                </div>
            </div> {{-- productos busqueda --}}
            <section class="section-productos">
                @foreach ($productos as $id => $producto)
                    <div class="producto">
                        <div class="imagen-producto">
                            <img src="{{ asset($producto->image_url) }}" alt="{{$producto->name}}" width="100">
                        </div>
                        <div class="datos-producto">
                            <h3>{{ $producto->name }}</h3>
                            <div class="info-precio">
                                <p>{{ $producto->presentation }}</p>
                                <p class="precio">{{ $producto->price }} bs</p>
                            </div>
                            <button class="btn-si btn-ver-producto" onclick="mostrarModal('{{ $producto->id }}', '{{ $producto->name }}', '{{ $producto->price }}', '{{ $producto->presentation}}', '{{ addslashes(nl2br($producto->specifications))}}', '{{ addslashes(nl2br($producto->description))}}', '{{ $producto->stock}}', '{{ $producto->image_url }}')">Ver producto</button>
                        </div>
                    </div>
                @endforeach
            </section>
            <div class="ver-todos-products">
                <a class="btn-si btn-ver-producto btn-all" href="{{route('product.index')}}"><p class="text-todos">ver todos</p></a>
            </div>
            
        </div>{{-- productos derecha --}}
    </div>{{-- contenido productos --}}
<!-- Ventana Modal -->
<div id="modalProducto" class="modal" style="display:none;">
    <div class="modal-content">
        <span class="close" onclick="cerrarModal()">&times;</span>
        <div class="modal-body">
            <div class="cont-imagen-modal">
                <img id="modalImagen" src="" alt="Producto" class="modal-imagen">
            </div>
            
            <h3 id="modalNombre" class="sub-modal"></h3>
            <p class="value-description" id="valueDescription"></p>
            <p class="specification sub-modal"><strong>Especies, dosis via de administración</strong></p>
            <p class="value-specification" id="valueSpecification"></p>
            <p class="sub-modal"><strong>Presentación: </strong></p>
            <p id="modalDescripcion"></p>
            <div class="precio-producto">
                <p class="sub-modal precio-modal"><strong>Precio: <span class="precio-modal" id="modalPrecio"></span> bs</strong></p>
            </div>
            
            <div class="modal-info">
                <div class="stock-contenido">
                        <p class="en-stock">En stock: </p>
                        <p class="value-stock en-stock"><strong id="valueStock"></strong></p>
                    
                </div>
                @can('admin.products.create')
                <div class="cantidad">
                    <p>Cantidad</p>
                    <input class="input-cantidad" type="number" id="cantidadProducto" value="1" min="1">
                </div>
                @endcan
            </div>
            @can('admin.products.create')
            <button class="btn-anadir btn-ver-producto" onclick="agregarAlCarrito()"><img src="images/productos/carrito.png" alt="carrito"><p>Añadir al carrito</p></button>
            <div class="acciones">
                <a class="editar" id="editarBtn" href=""> <img src="{{asset('images/edit.png')}}" alt="edit"> editar</a>
                <button class="eliminar" id="eliminarBtn" onclick=""> <img src="{{asset('images/delete.png')}}" alt="delete"> Eliminar</button>
            </div>
            @endcan
        </div>
    </div>
</div>


@endsection
<script>
    // Pasar la URL base de la ruta a JavaScript 
    const editRouteBase = "{{ route('product.edit', ':id') }}";
    const deleteRouteBase = "{{ route('product.destroy', ':id') }}";
</script>
<script src="{{asset('js/productIndex.js')}}"></script>