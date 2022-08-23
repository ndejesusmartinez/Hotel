<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Recupera tu contraseña</h1>    
    
    
    <form action="{{ url(route('changePassword')) }}" method="get">
        <input type="text" name="email" value="{{ $email }}">
        <button type="submit">
            Ingresa aqui para recuperar tu contraseña
        </button>
    </form>

    <a href="{{ url('changePassword') }}">opcion1</a>

    
</body>
</html>