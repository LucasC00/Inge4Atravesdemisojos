<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Importa la clase Auth
use Illuminate\Support\Facades\DB; // Importa la clase Auth

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function autenticarUsuario(Request $request)
    {
        // Recibe los datos del formulario enviado por POST
        $usuario = $request->input('usuario');
        $clave = $request->input('password');
    
        // Realiza la consulta SQL personalizada
        $usuarioData = DB::select("SELECT * FROM usuarios WHERE nombre_usuario = '$usuario'");
    
        // Verifica si se encontró un usuario con el nombre proporcionado
        if ($usuarioData) {
            $usuarioData = $usuarioData[0]; // Obtén el primer resultado (debería ser único)
            // Verificar la contraseña
            if (password_verify($clave, $usuarioData->contrasena)) {
                // Si la contraseña es correcta, realiza la autenticación
                // Por ejemplo, puedes guardar el usuario en la sesión
                session(['usuario' => $usuarioData]);
                // Redirige al usuario a la página de inicio
                return redirect()->route('home');
            }
        }
    
        // Si no se encuentra un usuario o la contraseña es incorrecta, redirige de vuelta al formulario de inicio de sesión con un mensaje de error
        return redirect()->route('login')->with('error', 'Credenciales incorrectas');
    }
}