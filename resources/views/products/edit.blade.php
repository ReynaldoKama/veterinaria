@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h2>Editar Producto</h2>
    <form action="{{ route('productos.update', $producto) }}" method="POST">
        @csrf
        @method('PUT')
        <!-- Campos de producto -->
        <input type="text" name="name" value="{{ $producto->name }}" placeholder="Nombre del Producto" required>
        <input type="number" name="price" value="{{ $producto->price }}" placeholder="Precio" required step="0.01">
        <input type="text" name="presentation" value="{{ $producto->presentation }}" placeholder="Presentación" required>
        <textarea name="specifications" placeholder="Especificaciones">{{ $producto->specifications }}</textarea>
        <textarea name="description" placeholder="Descripción">{{ $producto->description }}</textarea>
        <input type="number" name="stock" value="{{ $producto->stock }}" placeholder="Stock" required min="0">
        <input type="url" name="image_url" value="{{ $producto->image_url }}" placeholder="URL de la Imagen" required>

        <button type="submit">Actualizar Producto</button>
    </form>
</div>
@endsection
