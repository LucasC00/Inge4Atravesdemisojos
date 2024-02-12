<?php

class RegistroController {
    public function showRegistro() {
        include __DIR__ . '/../views/registro.php';
    }

    public function registrarusuario(){
        require __DIR__ . '/../../config/conexion.php';

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener los datos del formulario
            $nombreUsuario = $_POST["nombreUsuario"];
            $nombreReal = $_POST["nombreReal"];
            $correo = $_POST["correo"];
            $contrasena = $_POST["contrasena"];
    // Asegúrate de almacenar la contraseña de manera segura, por ejemplo, usando password_hash
            $hashedContrasena = password_hash($contrasena, PASSWORD_DEFAULT);

            $discapacidadVisual = isset($_POST["discapacidadVisual"]) ? "true" : "false";
            $sexo = $_POST["sexo"];
            $edad = $_POST["edad"];
            $biografia = $_POST["biografia"];
            $telefono = $_POST["telefono"];
            $ubicacion = $_POST["ubicacion"];
            $rol = $_POST["rol"];

    // Obtener la fecha actual
            $fechaRegistro = date("Y-m-d");

    // Preparar la consulta SQL
            $query = "INSERT INTO usuarios (nombre_usuario, nombre_real, correo, contrasena, discapacidad_visual, sexo, edad, fecha_registro, biografia, numero_telefono, ubicacion, id_rol)
              VALUES ('$nombreUsuario', '$nombreReal', '$correo', '$hashedContrasena', '$discapacidadVisual', '$sexo', $edad, '$fechaRegistro', '$biografia', '$telefono', '$ubicacion', $rol)";

    // Ejecutar la consulta
            $result = pg_query($conexion, $query);

            if ($result) {
                $_SESSION['nombre_usuario']=$usuario;
                header('Location: /login');
            } else {
                echo "Error al registrar usuario";
            }
        } else {
            echo "Acceso no autorizado";
        }

// Cerrar la conexión a la base de datos
        pg_close($conexion);

    }
}