<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">

    <title>My page title</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300%7CSonsie+One" rel="stylesheet"
        type="text/css">
    <link rel="stylesheet" href="../../public/css/style.css">
</head>

<body>

    <header>
        <div class="header-content">
            <img src="../../public/img/icono-principal.png" alt="Icono de Configuración" width="90" height="90">
            <h1>A través de mis ojos</h1>
        </div>
    </header>


    <nav>
        <ul>
            <li><a href="#">Inicio</a></li>
            <li><a href="#">Quienes somos</a></li>
            <li><a href="#"><img src="../../public/img/icono-tuerca.png" alt="Icono de Configuración" width="50" height="50"
                        style="
        width: 16px;
        height: 16px;
        margin-top: 15p;
        "> Configuración</a></li>
            <li><a href="/login"><img src="../../public/img/icono-logout.png" alt="Icono de Salir" width="50" height="50"
                        style="
        width: 16px;
        height: 16px;
        margin-top: 15p;
        "> Salir</a></li>


        </ul>

    </nav>

    <main>

        <article>
            <h2 class="h2-configurar">Configuración de Usuario</h2>
            <form id="configuracionForm" method="POST" action="/configuracion-realizar" class="form-configurar">
                <div class="section-configurar">
                    <label for="nombreUsuario">Nombre de Usuario:</label>
                    <input type="text" id="nombreUsu" name="nombreUsuario" class="input-configurar" >

                    <label for="correo">Correo Electrónico:</label>
                    <input type="email" id="correo" name="correo" class="input-configurar" >

                    <label for="edad">Edad:</label>
                    <input type="number" id="edad" name="edad" class="input-configurar" >

                    <label for="sexo">Sexo:</label>
                    <select id="sexo" name="sexo" class="select-configurar" >
                        <option value="M">Masculino</option>
                        <option value="F">Femenino</option>
                        <option value="O">Otro</option>
                    </select>

                    <label for="biografia">Biografía:</label>
                    <input id="biografia" name="biografia" class="input-configurar"></input>

                </div>
                <div class="section-configurar">
                    <label for="discapacidadVisual">Discapacidad Visual:</label>
                    <input type="checkbox" id="discapacidadVisual" name="discapacidadVisual" class="checkbox-configurar">

                    <!-- Agrega aquí más campos según tus necesidades -->

                    <label>Cambiar Contraseña:</label>
                    <a href="#" onclick="enviarCorreo()" class="enlace">Al hacer click recibirás el correo</a>

                </div>
                <div class="submit-container">
                    <button type="submit" class="button-configurar">Guardar</button>
                </div>
            </form>
        </article>


    </main>

    <footer>
        <p>Aqui pondremos info de redes social y otros enlaces</p>
    </footer>

</body>

</html>