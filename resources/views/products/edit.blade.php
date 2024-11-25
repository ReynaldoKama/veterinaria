@extends('layouts.dashboard')

@section('content')

<link rel="stylesheet" href="{{ asset('css/crudproductos.css') }}">
<div class="register-producto-container">
    {{-- <div>
        <a href="{{ route('home') }}"><img src="{{asset('images/logo.png')}}" alt="logo bienestar animal"></a>
    </div> --}}
    <div class="crud-producto-form">
        <h2 class="titulo-crud-productos">Registrar productos</h2>
        <form action="{{ route('product.update', $producto->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!-- Campos de producto -->
            <div class="inputs-registro">
                <div class="content-input-text">
                    <div class="label-input">
                        <P>Nombre del producto</P>
                        <div class="input-group">
                            <input type="text" name="name" required value="{{old('name', $producto->name)}}">
                        </div>
                    </div>

                    <div class="label-input">
                        <P>Presentación</P>
                        <div class="input-group">    
                            <input type="text" name="presentation" required value="{{old('presentation', $producto->presentation)}}">
                        </div>
                    </div>
                    
                    
                    <div class="price-stock">
                        <div class="label-input">
                            <P>Precio</P>
                            <div class="input-group">
                                <input type="number" name="price" required step="0.01" value="{{old('price', $producto->price)}}">
                            </div>
                        </div>

                        <div class="label-input">
                            <P>Stock</P>
                            <div class="input-group">
                                <input type="number" name="stock" required min="0" value="{{old('stock', $producto->stock)}}">
                            </div>
                        </div>

                        <div class="label-input">
                            <P>Categoría</P>
                            <div class="input-group">
                                <select class="categoria-create" name="categoria" id="categoria">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $producto->category_id ==  $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="content-texarear">
                    <div class="label-input">
                        <P>Especificación</P>
                        <textarea class="cont-desc desc-textarea" name="specifications">{{old('specifications', $producto->specifications)}}</textarea>
                    </div>
                    <div class="label-input">
                        <P>Descripción</P>
                        <textarea name="description">{{old('description', $producto->description)}}</textarea>
                    </div>
                </div>
            </div>
            <div class="label-input">
                <P>Imagen del producto</P>
                <div class="input-group add-imagen-producto">
                    <input type="file" name="image_url" id="imageUrlInput">
                    <img id="currentImage" src="{{ asset($producto->image_url) }}" alt="Imagen actual del producto" style="display: none; max-width: 100px; max-height: 100px;"> 
                    <p id="imageFileName" style="display: none;">{{ basename($producto->image_url) }}</p>
                    {{-- <input type="hidden" name="current_image" id="currentImageInput" value="{{ $producto->image_url }}"> --}}
                </div>
            </div>
            
            <button class="btn-producto-guardar" type="submit"><p class="guardar-producto-text">Actualizar Producto</p></button>
            
        </form>
        <div class="btn-cancelar">
            <a href="{{route('product.index')}}" class="btn-producto-guardar cancelar-add"><p class="guardar-producto-text">Cancelar</p></a>
        </div>
    </div>
</div>
@endsection

<script src="{{asset('js/productEdit.js')}}"></script>
