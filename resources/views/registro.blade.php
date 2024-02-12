<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">

    <title>My page title</title>
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
            <li><a href="#">Quienes somos</a></li>
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
            <h2 class="h2-registrar">Registro de Usuario</h2>
            <form id="registroForm" method="POST" action="{{route('registro-realizar')}}" class="form-registrar">
                @csrf
                <div class="section-registrar">
                    <label for="nombreUsuario">Nombre de Usuario:</label>
                    <input type="text" id="nombreUsuario" name="nombreUsuario" class="input-registrar" required>

                    <label for="nombreReal">Nombre Real:</label>
                    <input type="text" id="nombreReal" name="nombreReal" class="input-registrar" required>

                    <label for="correo">Correo Electrónico:</label>
                    <input type="email" id="correo" name="correo" class="input-registrar" required>

                    <label for="contrasena">Contraseña:</label>
                    <input type="password" id="contrasena" name="contrasena" class="input-registrar" required>

                    <label for="discapacidadVisual">Discapacidad Visual:</label>
                    <input type="checkbox" id="discapacidadVisual" name="discapacidadVisual" class="checkbox-registrar">

                    <label for="sexo">Sexo:</label>
                    <select id="sexo" name="sexo" class="select-registrar" required>
                        <option value="M">Masculino</option>
                        <option value="F">Femenino</option>
                        <option value="O">Otro</option>
                    </select>
                </div>
                <div class="section-registrar">
                    <label for="edad">Edad:</label>
                    <input type="number" id="edad" name="edad" class="input-registrar" required>

                    <label for="biografia">Biografía:</label>
                    <input id="biografia" name="biografia" class="input-registrar"></input>

                    <label for="telefono">Número de Teléfono:</label>
                    <input type="tel" id="telefono" name="telefono" class="input-registrar">

                    <label for="ubicacion">Ubicación:</label>
                    <input type="text" id="ubicacion" name="ubicacion" class="input-registrar">

                    <!-- Agrega aquí más campos según tus necesidades -->

                    <label for="rol">Rol:</label>
                    <select id="rol" name="rol" class="select-registrar" required>
                        <!-- Opciones de roles, puedes obtenerlas de la tabla "roles" -->
                        <option value="1">Usuario</option>
                        <option value="2">Moderador</option>
                        <!-- Agrega más opciones según tus roles -->
                    </select>
                </div>
                <div class="submit-container">
                    <button type="submit" class="button-registrar">Guardar</button>
                </div>
            </form>
        </article>


    </main>

    <footer>
        <p>Aqui pondremos info de redes social y otros enlaces</p>
    </footer>

</body>

</html>