@extends('layouts.login')

@section('content')
<link rel="stylesheet" href="css/register.css">

<div class="login-container">
    <a href="{{ route('home') }}"><img src="{{asset('images/logo.png')}}" alt="logo bienestar animal"></a>
    <p class="p-login">Regístrate en Bienestar Animal</p>
    <div class="login-form">
        <p class="signin-text">Ingresar</p>
        @if (Session::has('success')) 
            <div class="alert alert-success"> 
                {{ Session::get('success') }} 
            </div> 
        @endif 
        @if (Session::has('error')) 
            <div class="alert alert-danger"> 
                {{ Session::get('error') }} 
            </div> 
        @endif
        <form action="{{route('registrar-usuario')}}" method="post">
            @csrf
            <div class="cont-register">
                <p class="labels">Nombre</p>
                <div class="input-group input-group-register">
                    <input class="input-text" name="name" type="text" required>
                </div>
            </div>
            {{-- <div class="cont-register">
                <p class="labels">Apellidos</p>
                <div class="input-group input-group-register">
                    <input class="input-text" name="lastname" type="text" required>
                </div>
            </div> --}}
            <div class="cont-register">
                <p class="labels">Email</p>
                <div class="input-group input-group-register">
                    <input class="input-text" name="email" type="email" required>
                </div>
            </div>
            <div class="cont-register">
                <p class="labels">Contraseña</p>
                <div class="input-group input-group-register">
                    <input type="password" name="password" required>
                </div>
            </div>
            <button class="btn-signin" type="submit" class="btn-login"><p class="signin-text">Registrar</p></button>
        </form>
        @if (Session::has('success')) 
            <div class="success-login"> 
                <a href="{{route('login')}}"><p>Iniciar sesión</p></a>
            </div> 
        @endif 
        
    </div>
</div>
@endsection
