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
                            <p>10</p>
                        </div>
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
                <div class="producto">
                    <div class="imagen-producto">
                        <img src="images/productos/REVALOR 200.png" alt="producto">
                    </div>
                    <div class="datos-producto">
                        <h3>REVALOR 200</h3>
                        <div class="info-precio">
                            <p>Caja de 10 cartuchos x 10 dosis</p>
                            <p class="precio">20.00 bs</p>
                        </div>
                        <button class="btn-si btn-ver-producto"><p>Ver producto</p></button>
                    </div>
                </div>
                <div class="producto">
                    <div class="imagen-producto">
                        <img src="images/productos/REVALOR 200.png" alt="producto">
                    </div>
                    <div class="datos-producto">
                        <h3>REVALOR 200</h3>
                        <div class="info-precio">
                            <p>Caja de 10 cartuchos x 10 dosis</p>
                            <p class="precio">20.00 bs</p>
                        </div>
                        <button class="btn-si btn-ver-producto"><p>Ver producto</p></button>
                    </div>
                </div>
                <div class="producto">
                    <div class="imagen-producto">
                        <img src="images/productos/REVALOR 200.png" alt="producto">
                    </div>
                    <div class="datos-producto">
                        <h3>REVALOR 200</h3>
                        <div class="info-precio">
                            <p>Caja de 10 cartuchos x 10 dosis</p>
                            <p class="precio">20.00 bs</p>
                        </div>
                        <button class="btn-si btn-ver-producto"><p>Ver producto</p></button>
                    </div>
                </div>
                <div class="producto">
                    <div class="imagen-producto">
                        <img src="images/productos/REVALOR 200.png" alt="producto">
                    </div>
                    <div class="datos-producto">
                        <h3>REVALOR 200</h3>
                        <div class="info-precio">
                            <p>Caja de 10 cartuchos x 10 dosis</p>
                            <p class="precio">20.00 bs</p>
                        </div>
                        <button class="btn-si btn-ver-producto"><p>Ver producto</p></button>
                    </div>
                </div>
                <div class="producto">
                    <div class="imagen-producto">
                        <img src="images/productos/REVALOR 200.png" alt="producto">
                    </div>
                    <div class="datos-producto">
                        <h3>REVALOR 200</h3>
                        <div class="info-precio">
                            <p>Caja de 10 cartuchos x 10 dosis</p>
                            <p class="precio">20.00 bs</p>
                        </div>
                        <button class="btn-si btn-ver-producto"><p>Ver producto</p></button>
                    </div>
                </div>
                <div class="producto">
                    <div class="imagen-producto">
                        <img src="images/productos/REVALOR 200.png" alt="producto">
                    </div>
                    <div class="datos-producto">
                        <h3>REVALOR 200</h3>
                        <div class="info-precio">
                            <p>Caja de 10 cartuchos x 10 dosis</p>
                            <p class="precio">20.00 bs</p>
                        </div>
                        <button class="btn-si btn-ver-producto"><p>Ver producto</p></button>
                    </div>
                </div>
                <div class="producto">
                    <div class="imagen-producto">
                        <img src="images/productos/REVALOR 200.png" alt="producto">
                    </div>
                    <div class="datos-producto">
                        <h3>REVALOR 200</h3>
                        <div class="info-precio">
                            <p>Caja de 10 cartuchos x 10 dosis</p>
                            <p class="precio">20.00 bs</p>
                        </div>
                        <button class="btn-si btn-ver-producto"><p>Ver producto</p></button>
                    </div>
                </div>
                <div class="producto">
                    <div class="imagen-producto">
                        <img src="images/productos/REVALOR 200.png" alt="producto">
                    </div>
                    <div class="datos-producto">
                        <h3>REVALOR 200</h3>
                        <div class="info-precio">
                            <p>Caja de 10 cartuchos x 10 dosis</p>
                            <p class="precio">20.00 bs</p>
                        </div>
                        <button class="btn-si btn-ver-producto"><p>Ver producto</p></button>
                    </div>
                </div>
                <div class="producto">
                    <div class="imagen-producto">
                        <img src="images/productos/REVALOR 200.png" alt="producto">
                    </div>
                    <div class="datos-producto">
                        <h3>REVALOR 200</h3>
                        <div class="info-precio">
                            <p>Caja de 10 cartuchos x 10 dosis</p>
                            <p class="precio">20.00 bs</p>
                        </div>
                        <button class="btn-si btn-ver-producto"><p>Ver producto</p></button>
                    </div>
                </div>
            </section>
        </div>{{-- productos derecha --}}
    </div>{{-- contenido productos --}}
    
@endsection
