@extends('layouts.dashboard')

@section('content')
<link rel="stylesheet" href="{{ asset('css/crudproductos.css') }}">
<div class="register-producto-container">
    {{-- <div>
        <a href="{{ route('home') }}"><img src="{{asset('images/logo.png')}}" alt="logo bienestar animal"></a>
    </div> --}}
    <div class="crud-producto-form">
        <h2 class="titulo-crud-productos">Registrar productos</h2>
        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Campos de producto -->
            <div class="inputs-registro">
                <div class="content-input-text">
                    <div class="label-input">
                        <P>Nombre del producto</P>
                        <div class="input-group">
                            <input type="text" name="name" required>
                        </div>
                    </div>

                    <div class="label-input">
                        <P>Presentación</P>
                        <div class="input-group">    
                            <input type="text" name="presentation" required>
                        </div>
                    </div>
                    
                    
                    <div class="price-stock">
                        <div class="label-input">
                            <P>Precio</P>
                            <div class="input-group">
                                <input type="number" name="price" required step="0.01">
                            </div>
                        </div>

                        <div class="label-input">
                            <P>Stock</P>
                            <div class="input-group">
                                <input type="number" name="stock" required min="0">
                            </div>
                        </div>

                        <div class="label-input">
                            <P>Categoría</P>
                            <div class="input-group">
                                <select class="categoria-create" name="categoria" id="categoria">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="content-texarear">
                    <div class="label-input">
                        <P>Especificación</P>
                        <textarea class="cont-desc desc-textarea" name="specifications"></textarea>
                    </div>
                    <div class="label-input">
                        <P>Descripción</P>
                        <textarea name="description"></textarea>
                    </div>
                </div>
            </div>
            <div class="label-input">
                <P>Imagen del producto</P>
                <div class="input-group add-imagen-producto">
                    <input type="file" name="image_url" required>
                </div>
            </div>
            
            <button class="btn-producto-guardar" type="submit"><p class="guardar-producto-text">Guardar Producto</p></button>
            
        </form>
        <div class="btn-cancelar">
            <a href="{{route('product.index')}}" class="btn-producto-guardar cancelar-add"><p class="guardar-producto-text">Cancelar</p></a>
        </div>
    </div>
</div>
@endsection
