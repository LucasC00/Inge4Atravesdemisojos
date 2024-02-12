<?php
session_start(); // Iniciar la sesión

class ConfiguracionController {
    public function showConfiguracion() {
        include __DIR__ . '/../views/configuracion.php';
    }

    public function configurarUsuario() {
        require __DIR__ . '/../../config/conexion.php';

        // Verificar si el usuario ha iniciado sesión
        if (!isset($_SESSION['nombre_usuario'])) {
            // Redirigir al usuario al inicio de sesión si no ha iniciado sesión
            header('Location: /login');
            exit;
        }

        // Obtener el nombre de usuario del usuario actualmente autenticado
        $nombreUsuarioLogueado = $_SESSION['nombre_usuario'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Recoger los datos del formulario
            $camposActualizar = [];
        
            if (!empty($_POST['nombreUsuario'])) {
                $nombreUsuario = $_POST['nombreUsuario'];
                $camposActualizar[] = "nombre_usuario = '$nombreUsuario'";
            }
            if (!empty($_POST['correo'])) {
                $correo = $_POST['correo'];
                $camposActualizar[] = "correo = '$correo'";
            }
            if (!empty($_POST['edad'])) {
                $edad = $_POST['edad'];
                $camposActualizar[] = "edad = $edad";
            }
            if (!empty($_POST['sexo'])) {
                $sexo = $_POST['sexo'];
                $camposActualizar[] = "sexo = '$sexo'";
            }
            if (!empty($_POST['biografia'])) {
                $biografia = $_POST['biografia'];
                $camposActualizar[] = "biografia = '$biografia'";
            }
            
            $discapacidadVisual = isset($_POST["discapacidadVisual"]) ? "true" : "false";
            $camposActualizar[] = "discapacidad_visual = '$discapacidadVisual'";
            
        
            // Verificar si se han enviado campos para actualizar
            if (empty($camposActualizar)) {
                echo "No se han proporcionado campos para actualizar.";
                exit;
            }
        
            // Construir la parte SET de la consulta SQL
            $setPart = implode(", ", $camposActualizar);
        
            // Preparar la consulta para actualizar datos en la tabla usuarios
            $query = "UPDATE usuarios SET $setPart WHERE nombre_usuario = '$nombreUsuarioLogueado'";
        
            // Ejecutar la consulta
            $result = pg_query($conexion, $query);
        

            if ($result) {
                if (!empty($_POST['nombreUsuario'])) {
                    $_SESSION['nombre_usuario'] = $nombreUsuario; // Corregir el nombre de la variable
                }
                header('Location: /home');
                exit; // Terminar el script después de redireccionar
                
            } else {
                echo "Error al actualizar usuario: " . pg_last_error($conexion); // Mostrar el error de PostgreSQL
            }

            // Cerrar la conexión a la base de datos
            pg_close($conexion);
        }
    }
}
?>
