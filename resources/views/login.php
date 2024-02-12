<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Formulario de Acceso</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Utilizamos el helper asset() para cargar los recursos estáticos (CSS, imágenes, etc.) -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="login-body">
    <div class="login-contenedor">
        <div class="login-central">
            <div style="display: flex; justify-content: center; align-items: center;">
                <!-- Utilizamos el helper asset() para cargar la imagen -->
                <img src="{{ asset('images/icono-principal.png') }}" alt="Icono de Entidad" width="90" height="90">
            </div>
            <div class="login" id="login">
                <div class="login-titulo">
                    Bienvenido
                </div>
                <form id="loginForm" method="POST" action="{{ route('login-autenticar') }}">
                    @csrf <!-- Agregamos el token CSRF para protección contra ataques CSRF -->
                    <input type="text" name="usuario" id="usuario" class="login-input" placeholder="Usuario" required>
                    <input type="password" id="password" placeholder="Contraseña" name="password" class="login-input" required>
                    <button type="submit" title="Ingresar" name="Ingresar" class="login-button">Login</button>
                </form>
                <div class="login-pie-form">
                    <a href="{{ route('registro-usuario') }}">¿No tienes Cuenta? Regístrate</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
