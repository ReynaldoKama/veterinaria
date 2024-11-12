<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Krub:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{asset('css/welcome.css') }}">

    <title>BienestarAnimal</title>
</head>
<body>
    <div class="contenido-principal">
        <div class="capa-inicial">
            <header class="header">
                <div class="header-content">
                    <a href="{{ route('home') }}"><img src="{{asset('images/logo.png')}}" alt="logo bienestar animal"></a>
                    <div class="content-left">
                        <nav class="navegacion">
                            <a href="{{ route('product.index') }}"><p>Productos</p></a>
                            <a href="{{ route('citas.index')}}"><p>citas</p></a>
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
                <div class="contenido-text">
                    <h1>Venta de medicamentos, consultas y reserva de citas médicas</h1>
                </div>
            </div>
        </div>
    </div> {{--  contenido-principal --}}
    <main class="main-principal">
        <h2 class="section-titulos">Tratamientos y Consejos</h2>
        <section class="section">
            <div class="section-content">
                <div class="section-text">
                    <h2>Moquillo en gatos - Tratamiento</h2>
                    <p>Nullam ac sem sit amet nisl tincidunt efficitur. Etiam in erat dictum, accumsan urna quis, porttitor quam. Nunc quam ex, aliquet bibendum mattis at, pellentesque vitae mauris.</p>
                    <a class="btn-si btn-leer" href="#"><img src="{{asset('images/sign in.png')}}" alt="img"><p>Leer más</p></a>
                </div>
                <div class="section-img">
                    <img src="{{asset('images/gato.jpg')}}" alt="gato">
                </div>
            </div>
        </section>
        <section class="section">
            <div class="section-content">
                <div class="section-img">
                    <img src="{{asset('images/section-depresion.jpg')}}" alt="gato">
                </div>
                <div class="section-text">
                    <h2>Depresión en perros</h2>
                    <p>Praesent eros neque, finibus sit amet justo et, blandit vehicula velit. Nam imperdiet ex quis mi cursus volutpat. Phasellus neque nibh, finibus vitae sollicitudin vel, volutpat ac nibh. </p>
                    <a class="btn-si btn-leer" href="#"><img src="{{asset('images/sign in.png')}}" alt="img"><p>Leer más</p></a>
                </div>
                
            </div>
        </section>
        <section class="section">
            <div class="section-content">
                <div class="section-text">
                    <h2>Eliminar pulgas en casa</h2>
                    <p>Aliquam dolor sapien, tristique ut placerat id, placerat nec lorem. Donec quis vestibulum orci, ac finibus mauris. Sed egestas tristique feugiat. Donec auctor, nibh vitae facilisis interdum, libero lectus volutpat ex, vel finibus nunc eros vitae velit. Nulla facilisi..</p>
                    <a class="btn-si btn-leer" href="#"><img src="{{asset('images/sign in.png')}}" alt="img"><p>Leer más</p></a>
                </div>
                <div class="section-img">
                    <img src="{{asset('images/section-pulgas.jpg')}}" alt="gato">
                </div>
            </div>
        </section>
    </main>
</body>
</html>
