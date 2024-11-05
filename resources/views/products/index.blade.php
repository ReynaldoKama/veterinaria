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
                        <p id="total-productos">0 productos</p>   
                    </div>
                    <div id="carrito-contenido">
                    </div>
                    <div class="total-suma-container">
                        <h3>Monto Total a Pagar</h3>
                        <p id="total-suma">Total: 0 Bs</p> <!-- Muestra la sumatoria total al final -->
                        <button id="pagar-btn" class="btn-si btn-ver-producto" onclick="pagar()" style="display:none;">Pagar</button>
                    </div>
                </div>
            </div>{{-- cotizador productos --}}
            <div class="categoria-productos">
                <h3 class="titulos-izquierda">Categorias</h3>
                <div class="datos-izquierda">
                    <nav class="navegacion-categorias">
                        <ul>
                            <li><a href="#"><p>Anabólicos</p></a></li>
                            <li><a href="#"><p>Antibióticos</p></a></li>
                            <li><a href="#"><p>Antiinflamatorios</p></a></li>
                            <li><a href="#"><p>Antiparasitarios</p></a></li>
                            <li><a href="#"><p>Hormonales</p></a></li>
                            <li><a href="#"><p>Vitaminas y minerales</p></a></li>
                        </ul>
                    </nav>
                </div>
            </div>{{-- cotizador productos --}}
        </div>{{-- productos izquierda --}}
        <div class="productos-derecha">
            <h2 class="titulo-productos">Todos los Productos</h2>
            <div class="productos-busqueda">
                <div class="buscador-text">
                    <input type="text" placeholder="Buscar productos">
                    <button type="submit"><img src="images/productos/search.png" alt="buscar"></button>
                </div>
                <select class="select-productos" name="" id="">
                    <option value="">Ordenar por</option>
                    <option value="">Nombre</option>
                    <option value="">Precio</option>
                    <option value="">Categoria</option>
                </select>
            </div> {{-- productos busqueda --}}
            <section class="section-productos">
                @foreach ($productos as $id => $producto)
                    <div class="producto">
                        <div class="imagen-producto">
                            <img src="{{ $producto['imagen_url'] }}" alt="producto">
                        </div>
                        <div class="datos-producto">
                            <h3>{{ $producto['nombre'] }}</h3>
                            <div class="info-precio">
                                <p>{{ $producto['descripcion'] }}</p>
                                <p class="precio">{{ $producto['precio'] }}</p>
                            </div>
                            <button class="btn-si btn-ver-producto" onclick="mostrarModal('{{ $id }}', '{{ $producto['nombre'] }}', '{{ $producto['precio'] }}', '{{ $producto['descripcion'] }}', '{{ $producto['imagen_url'] }}')">Ver producto</button>
                        </div>
                    </div>
                @endforeach
            </section>
        </div>{{-- productos derecha --}}
    </div>{{-- contenido productos --}}
<!-- Ventana Modal -->
<div id="modalProducto" class="modal" style="display:none;">
    <div class="modal-content">
        <span class="close" onclick="cerrarModal()">&times;</span>
        <div class="modal-body">
            <img id="modalImagen" src="" alt="Producto" class="modal-imagen">
            <h3 id="modalNombre"></h3>
            <p id="modalDescripcion"></p>
            <p><strong>Precio: </strong><span id="modalPrecio"></span> Bs</p>
            <div class="modal-info">
                <span class="en-stock">En stock</span>
                <div class="cantidad">
                    <label for="cantidadProducto">Cantidad:</label>
                    <input type="number" id="cantidadProducto" value="1" min="1">
                </div>
            </div>
            <button class="btn-si btn-ver-producto" onclick="agregarAlCarrito()">Añadir al carrito</button>
        </div>
    </div>
</div>

<script>
    let carrito = [];

    function mostrarModal(id, nombre, precio, descripcion, imagenUrl) {
    const modal = document.getElementById('modalProducto');
    modal.style.display = 'block';

    // Configurar el contenido del modal
    document.getElementById('modalNombre').innerText = nombre || 'Producto sin nombre';
    document.getElementById('modalPrecio').innerText = precio || '0';
    document.getElementById('modalDescripcion').innerText = descripcion || 'Sin descripción';
    document.getElementById('modalImagen').src = imagenUrl || 'ruta/de/imagen/por/defecto.png';  // Agrega una ruta de imagen por defecto si no hay imagen
    }

    function cerrarModal() {
        document.getElementById('modalProducto').style.display = 'none';
    }

    function agregarAlCarrito() {
        const nombre = document.getElementById('modalNombre').innerText;
        const precio = parseFloat(document.getElementById('modalPrecio').innerText) || 0;
        const cantidad = parseInt(document.getElementById('cantidadProducto').value) || 0;

        if (cantidad > 0) { // Solo agrega si la cantidad es válida
            carrito.push({ nombre, precio, cantidad });
            actualizarCarrito();
        } else {
            alert("Por favor, ingrese una cantidad válida.");
        }
        cerrarModal();
    }

    function actualizarCarrito() {
        const carritoContenido = document.getElementById('carrito-contenido');
        carritoContenido.innerHTML = ''; // Limpiar el contenido previo

        let totalSuma = 0;
        let totalProductos=0;

        carrito.forEach(item => {
            totalProductos+= item.cantidad
            const itemTotal = item.precio * item.cantidad;
            totalSuma += itemTotal;

            const productoInfo = document.createElement('div');
            productoInfo.innerHTML = `<p><strong>${item.nombre}</strong><span>  </span><span>  </span>${item.precio} Bs </p>`;
            carritoContenido.appendChild(productoInfo);
        });
        document.getElementById('total-productos').innerText =`${totalProductos}`; 
        document.getElementById('total-suma').innerText = `${totalSuma} Bs`;
        // Mostrar el botón de pagar si hay productos en el carrito
        const pagarBtn = document.getElementById('pagar-btn');
        if (totalProductos > 0) {
            pagarBtn.style.display = 'inline-block';
        } else {
            pagarBtn.style.display = 'none';
        }
    }

    function pagar() {
        alert('Proceso de pago iniciado');
    }   
</script>
<style>
    /* Estilos del Modal */
    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.6);
        justify-content: center;
        align-items: center;
    }
    .modal-content {
        background-color: #fff;
        padding: 20px;
        width: 90%;
        max-width: 500px;
        border-radius: 8px;
        position: relative;
        text-align: center;
        position: relative;
        margin: auto;
        top: 50%;
        transform: translateY(-50%);
    }
    .close {
        position: absolute;
        top: 10px;
        right: 10px;
        font-size: 24px;
        cursor: pointer;
    }
    .modal-imagen {
        width: 100%;
        max-width: 250px;
        height: auto;
    }
    .modal-info {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 15px;
    }
    .en-stock {
        color: green;
        font-weight: bold;
    }
    .cotizador-producto-item {
    display: flex;
    flex-direction: column;
    align-items: start;
    margin-bottom: 10px;
    }

    .cotizador-producto-item p {
        margin: 5px 0;
        font-size: 14px;
    }
</style>
@endsection
