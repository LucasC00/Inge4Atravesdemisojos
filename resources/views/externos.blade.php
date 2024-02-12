<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recursos Externos - A Través de Mis Ojos</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300%7CSonsie+One" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/styles.css">
    <style>
        /* Estilos CSS para los enlaces dentro de recursos-container */
        #recursos-container a {
            font-size: 15px; /* Cambia este valor al tamaño deseado */
        }
    </style>
</head>
<body>
<header>
    <div class="header-content">
        <img src="/icono-principal.png" alt="Icono de Configuración" width="90" height="90">
        <h1>A través de mis ojos</h1>
    </div>
</header>

<nav>
    <ul>
        <li><a href="{{route('home')}}">Inicio</a></li>
        <li>
            <a href="{{route('configuracion-usuario')}}">
                <img src="/icono-tuerca.png" alt="Icono de Configuración" width="50" height="50" style="
                width: 16px;
                height: 16px;
                margin-top: 15p;
                ">
                Configuración
            </a>
        </li>
        <li>
            <a href="{{route('login')}}">
                <img src="/icono-logout.png" alt="Icono de Salir" width="50" height="50" style="
                width: 16px;
                height: 16px;
                margin-top: 15p;
                ">
                Salir
            </a>
        </li>
    </ul>
</nav>

<main>
    <article>
        <h2>Recursos Externos sobre la Discapacidad Visual</h2>
        <p>Bienvenido a "Recursos Externos sobre la Discapacidad Visual". Aquí encontrarás enlaces a otros sitios, webs, vlogs y foros sobre la discapacidad visual, todos seleccionados por su relevancia e interés.</p>
        <section id="recursos-container">
            @foreach ($recursos as $recurso)
                <h3><a href="{{$recurso->enlace}}">{{ $recurso->titulo }}</a></h3>
                <p>{{ $recurso->descripcion }}</p>
            @endforeach
        </section>
    </article>

    <aside>
        <h2>Secciones</h2>
        <ul>
            <li><a href="{{route('recursos-externos')}}">Recursos externos</a></li>
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
