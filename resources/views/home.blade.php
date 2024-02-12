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

        <article>
            <h2>Objetivo</h2>

            <p>El proyecto consiste en desarrollar un sitio web que aborde la temática de la discapacidad
                visual, proporcionando información valiosa tanto para personas con discapacidad visual
                como para aquellas sin esta condición. El sitio se centra en la interacción entre los
                usuarios, permitiéndoles hacer preguntas, compartir respuestas y votar sobre contenidos
                relacionados con la ceguera.</p>

            <h2>Guia del sistema</h2>

            <h3>1. Recursos externos</h3>
            <p>
                Encuentra artículos interesantes relacionados con la discapacidad visual y otros temas relevantes.
            </p>

            <h3>2. Reportes</h3>
            <p>
                Accede a informes y reportes sobre usuarios, recursos externos, etc .
            </p>

            <h3>3. Configuración de usuario</h3>
            <p>
                Personalizar tu perfil y configurar tus preferencias de usuario.
            </p>
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