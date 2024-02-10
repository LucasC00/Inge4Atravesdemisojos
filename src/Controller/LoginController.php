<?php

class LoginController {
    public function showLogin() {
        include __DIR__ . '/../views/login.php';
    }

    public function autenticarUsuario() {
        require __DIR__ . '/../../config/conexion.php';
        session_start();

        // Recibe los datos del formulario enviado por POST
        $usuario = $_POST['usuario'] ?? '';
        $clave = $_POST['password'] ?? '';

        // Hashear la contraseña antes de compararla con la base de datos
        $claveHasheada = password_hash($clave, PASSWORD_DEFAULT);

        $query = "SELECT * FROM usuarios WHERE nombre_usuario='$usuario'";
        $consulta = pg_query($conexion, $query);
        $cantidad = pg_num_rows($consulta);

        if ($cantidad > 0) {
            $usuarioData = pg_fetch_assoc($consulta);

            // Verificar la contraseña hasheada
            if (password_verify($clave, $usuarioData['contrasena'])) {
                $_SESSION['nombre_usuario'] = $usuario;
                // Redirige al usuario después del inicio de sesión exitoso
                header('Location: /home');
                exit();
            }
        }

        // Redirige con un parámetro de error
        header('Location: /login?error=incorrecto');
        exit();
    }
}
