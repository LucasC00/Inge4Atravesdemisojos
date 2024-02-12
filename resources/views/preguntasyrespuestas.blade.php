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
            <li><a href="#">Quienes somos</a></li>
            <li><a href="{{route('configuracion-usuario')}}"><img src="/icono-tuerca.png"
                        alt="Icono de Configuración" width="50" height="50"
                        style="width: 16px; height: 16px; margin-top: 15p;"> Configuración</a></li>
            <li><a href="{{route('login')}}"><img src="/icono-logout.png" alt="Icono de Salir" width="50"
                        height="50" style="width: 16px; height: 16px; margin-top: 15p;"> Salir</a></li>
        </ul>
    </nav>

    <main class="preguntasyrespuestas">

        <div id="preguntas-respuestas">

            <h2>Preguntas y Respuestas</h2>

            <ul>
                @foreach($preguntas as $pregunta)
                <li>
                    <h3>{{ $pregunta->titulo }}</h3>
                    <p>{{ $pregunta->descripcion }}</p>
                    <div class="votos">
                        <div class="like"><i class="fas fa-thumbs-up"></i></div>
                        <div class="dislike"><i class="fas fa-thumbs-down"></i></div>
                        <span>{{ $pregunta->votosPositivos() }} Likes</span>
                        <span>{{ $pregunta->votosNegativos() }} Dislikes</span>
                    </div>

                    <ul>
                        @foreach($pregunta->respuestas as $respuesta)
                        <li>
                            <h4>Respuesta:</h4>
                            <p>{{ $respuesta->descripcion }}</p>
                            <div class="votos">
                                @php
                                $likes = $respuesta->votos_respuestas->where('es_positivo', true)->count();
                                $dislikes = $respuesta->votos_respuestas->where('es_positivo', false)->count();
                                @endphp
                                <div class="like"><i class="fas fa-thumbs-up"></i> {{ $likes }}</div>
                                <div class="dislike"><i class="fas fa-thumbs-down"></i> {{ $dislikes }}</div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </li>
                @endforeach
            </ul>

        </div>

        <aside>
            <h2>Secciones</h2>

            <ul>
                <li><a href="#">Preguntas y respuestas</a></li>
                <li><a href="{{ route('recursos-externos') }}">Recursos Externos</a></li>
                <li><a href="#">Reportes</a></li>
            </ul>
        </aside>

    </main>

    <footer>
        <p>Unete a nuestro grupo de discord</p>
        <a href="https://discord.gg/4SyUXDnz">Canal</a>
    </footer>

</body>

</html>
