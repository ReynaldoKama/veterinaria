<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión - Bienestar Animal</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>

<div class="login-container">
    <a href="{{ route('home') }}"><img src="{{asset('images/logo.png')}}" alt="logo bienestar animal"></a>
    <h2>Iniciar sesión en Bienestar Animal</h2>
    <form>
        <div class="input-group">
            <input type="email" placeholder="Correo electrónico" required>
        </div>
        <div class="input-group">
            <input type="password" placeholder="Contraseña" required>
        </div>
        <button type="submit" class="btn-login">Iniciar sesión</button>
    </form>
</div>

</body>
</html>