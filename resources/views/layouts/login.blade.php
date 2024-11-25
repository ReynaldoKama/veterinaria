<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="css/register.css">
    <title>Login</title>
</head>
<body>
    <div class="contenido-principal login-content">
        <div class="capa-inicial">
            @yield('content')
        </div>
    </div>
</body>
</html>