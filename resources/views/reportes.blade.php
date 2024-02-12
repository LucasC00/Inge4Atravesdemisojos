<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">

    <title>Home</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300%7CSonsie+One" rel="stylesheet"
        type="text/css">
    <link rel="stylesheet" href="/styles.css">
</head>

<body>

    <header>
        <div class="header-content">
            <img src="/icono-principal.png" alt="Icono Principal" width="90" height="90">
            <h1>A través de mis ojos</h1>
        </div>
    </header>


    <nav>
        <ul>
            <li><a href="{{route('home')}}">Inicio</a></li>
            <li><a href="{{route('configuracion-usuario')}}"><img src="/icono-tuerca.png" alt="Icono de Configuración" width="50" height="50" style="
        width: 16px;
        height: 16px;
        margin-top: 15p;
        "> Configuración</a></li>
            <li><a href="{{route('login')}}"><img src="/icono-logout.png" alt="Icono de Salir" width="50" height="50"
                        style="
        width: 16px;
        height: 16px;
        margin-top: 15p;
        "> Salir</a></li>


        </ul>

    </nav>

    <main>

        <article class="article-reportes">
            <h2>Reportes</h2>
            <hr>

            <h3>Últimos 5 Usuarios Registrados</h3>
            <ul>
                @foreach($usuarios as $usuario)
                <li>{{ $usuario->nombre_usuario }}</li>
                @endforeach
            </ul>

            <h3>Últimos 5 Artículos Interesantes</h3>
            <ul>
                @foreach($articulos as $articulo)
                <li>{{ $articulo->titulo }}</li>
                @endforeach
            </ul>

            <h3>Últimos 5 Recursos Externos</h3>
            <ul>
                @foreach($recursos as $recurso)
                <li>{{ $recurso->titulo }}</li>
                @endforeach
            </ul>
        </article>

        <aside>
            <h2>Secciones</h2>

            <ul>
                <li><a href="{{route('recursos-externos')}}">Recursos Externos</a></li>
                <li><a href="{{ route('reportes') }}">Reportes</a></li>
            </ul>
        </aside>

    </main>

    <footer>
        <p>Unete a nuestro grupo de discord</p>
        <a href="https://discord.gg/4SyUXDnz">Canal</a>
    </footer>

</body>

</html>
