<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Krub:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/productos.css') }}">
    <link rel="stylesheet" href="{{ asset('css/citas.css') }}">

    <title>BienestarAnimal</title>
</head>
<body>
    <header class="header">
        <div class="header-content">
            <a href="{{ route('home') }}"><img src="{{asset('images/logo.png')}}" alt="logo bienestar animal"></a>
            <div class="content-left">
                <nav class="navegacion">
                    <a href="{{ route('product.index') }}"><p>Productos</p></a>
                    <a href="{{ route('citas.index') }}"><p>citas</p></a>
                    <a href="#"><p>Nosotros</p></a>
                    <a href="#"><p>Animales</p></a>
                    {{-- <li><a href="{{ route('#') }}">Nuevo animal</a></li> --}}
                </nav>
                @auth
                    <a class="btn-si" href="{{route('logout')}}"><p>cerrar sesión</p> <img src="{{asset('images/sign in.png')}}" alt="img"></a>
                @else
                    <a class="btn-si" href="{{route('login')}}"><p>Iniciar sesión</p> <img src="{{asset('images/sign in.png')}}" alt="img"></a>
                @endauth
            </div>
        </div>
    </header>
    <div class="contenedor">
        @yield('content')
    </div>
</body>
</html>