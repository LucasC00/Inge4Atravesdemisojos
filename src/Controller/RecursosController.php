<?php

class RecursosController {
    public function mostrarRecursosExternos() {
        // Obtener recursos
        $recursos = $this->obtenerRecursosExternos();

        // Almacenar el HTML en variables
        $header = '
            <head>
                <meta charset="utf-8">
                <title>Recursos Externos - A Través de Mis Ojos</title>
                <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300%7CSonsie+One" rel="stylesheet" type="text/css">
                <link rel="stylesheet" href="../../public/css/style.css">
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
				    <img src="../../public/img/icono-principal.png" alt="Icono de Configuración" width="90" height="90">
				    <h1>A través de mis ojos</h1>
			    </div>
		    </header>
        ';

        $nav = '
            <nav>
                <ul>
                    <li><a href="/home">Inicio</a></li>
                    <li><a href="#">Quiénes somos</a></li>
                    <li>
                        <a href="View/config.php">
                            <img src="../public/img/icono-tuerca.png" alt="Icono de Configuración" width="50" height="50" style="
                            width: 16px;
                            height: 16px;
                            margin-top: 15p;
                            ">
                            Configuración
                        </a>
                    </li>
                    <li>
                        <a href="View/login.php">
                            <img src="../public/img/icono-logout.png" alt="Icono de Salir" width="50" height="50" style="
                            width: 16px;
                            height: 16px;
                            margin-top: 15p;
                            ">
                            Salir
                        </a>
                    </li>
                </ul>
            </nav>
        ';

        $main = '
            <main>
                <article>
                    <h2>Recursos Externos sobre la Discapacidad Visual</h2>
                    <p>Bienvenido a "Recursos Externos sobre la Discapacidad Visual". Aquí encontrarás enlaces a otros sitios, webs, vlogs y foros sobre la discapacidad visual, todos seleccionados por su relevancia e interés.</p>
                    <section id="recursos-container">
        ';

        foreach ($recursos as $recurso) {
            $main .= '<h3><a href="' . $recurso['enlace'] . '">' . htmlspecialchars($recurso['titulo'], ENT_QUOTES, 'UTF-8') . '</a></h3>';
            $main .= '<p>' . htmlspecialchars($recurso['descripcion'], ENT_QUOTES, 'UTF-8') . '</p>';
        }

        $main .= '
                    </section>
                </article>

                <aside>
                    <h2>Secciones</h2>
                    <ul>
                        <li><a href="#">Preguntas y respuestas</a></li>
                        <li><a href="articulos.php">Artículos interesantes</a></li>
                        <li><a href="recursos_externos.php">Recursos externos</a></li>
                        <li><a href="#">Ideas innovadoras</a></li>
                        <li><a href="#">Reportes</a></li>
                    </ul>
                </aside>
            </main>
        ';

        $footer = '
            <footer>
                <p>Aquí pondremos información de redes sociales y otros enlaces</p>
            </footer>
        ';

        // Devolver el HTML en lugar de imprimirlo directamente
        return $header . $nav . $main . $footer;
    }

    public function imprimirHTML() {
        $html = $this->mostrarRecursosExternos();
        echo $html;
    }

    private function conectarBaseDatos() {
        try {
            return new PDO("pgsql:host=ep-round-fire-a52lahae.us-east-2.aws.neon.fl0.io;dbname=atravesdemisojos", "fl0user", "IuKj5nyhm8qM");
        } catch (PDOException $e) {
            $mensajeError = "Error al conectar a la base de datos: ({$e->getCode()}) {$e->getMessage()} en línea {$e->getLine()}";
            error_log($mensajeError, 3, "error_log.txt");
            echo "Ocurrió un error. Por favor, inténtalo de nuevo más tarde.";
            exit;
        }
    }

    private function obtenerRecursosExternos() {
        $conexion = $this->conectarBaseDatos();
        $consulta = $conexion->query("SELECT titulo, enlace, descripcion FROM recursos_externos");
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
}
