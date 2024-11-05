@extends('layouts.login')

@section('content')

<div class="login-container">
    <a href="{{ route('home') }}"><img src="{{asset('images/logo.png')}}" alt="logo bienestar animal"></a>
    <p class="p-login">Iniciar sesión en Bienestar Animal</p>
    <div class="login-form">
        <p class="signin-text">Ingresar</p>
        <form>
            <div class="input-group">
                <img src="{{asset('images/login/user1.png')}}" alt="">
                <input class="input-text" name="email" type="email" placeholder="Correo electrónico" required>
            </div>
            <div class="input-group">
                <img src="{{asset('images/login/password1.png')}}" alt="">
                <input type="password" placeholder="Contraseña" required>
            </div>
            <button class="btn-signin" type="submit" class="btn-login"><p class="signin-text">Iniciar sesión</p></button>
        </form>
        <p class="p-google">o continuar con</p>
        <div class="btn-signin social-media">
            <a href="#"><img src="{{asset('images/login/google.png')}}" alt=""></a>
        </div>
        <div class="login-registro">
            <p class="p-google">No tienes cuenta?</p> 
            <a href="#"><p class="p-google">Registrate</p></a>
        </div>
        
    </div>
</div>
@endsection
