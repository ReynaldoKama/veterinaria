@extends('layouts.login')

@section('content')
<div class="login-container">
    <div>
        <a href="{{ route('home') }}"><img src="{{asset('images/logo.png')}}" alt="logo bienestar animal"></a>
    </div>
    <p class="p-login">Registrar Nuevo Producto</p>
    <div class="login-form">
        <form action="{{ route('product.store') }}" method="POST">
            @csrf
            <!-- Campos de producto -->
            <div class="input-group">
                <input type="text" name="name" placeholder="Nombre del Producto" required> <br>
            </div>
            <div class="input-group">
                <input type="number" name="price" placeholder="Precio" required step="0.01"> <br>
            </div>
            <div class="input-group">    
                <input type="text" name="presentation" placeholder="Presentación" required> <br> 
            </div>
            <div class="input-group">
                <textarea name="specifications" placeholder="Especificaciones"></textarea> <br>
            </div>
            <div class="input-group">
                <textarea name="description" placeholder="Descripción"></textarea> <br>
            </div>
            <div class="input-group">
                <input type="number" name="stock" placeholder="Stock" required min="0"> <br>
            </div>
            <div class="input-group">
                <input type="file" name="image_url" accept="image/**" required> <br>
            </div>
            <button class="btn-signin" type="submit" class="btn-login"><p class="signin-text">Guradar Producto</p></button>
        </form>
    </div>
</div>
@endsection
