<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Importa la clase Auth

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function autenticarUsuario(Request $request)
    {
        // Recibe los datos del formulario enviado por POST
        $credenciales = $request->only('usuario', 'password');

        // Intenta autenticar al usuario usando el sistema de autenticación de Laravel
        if (Auth::attempt($credenciales)) {
            // Si la autenticación es exitosa, guarda la información del usuario en la sesión
            $request->session()->regenerate(); // Regenera la sesión para evitar ataques de sesión falsa
            $request->session()->put('usuario', Auth::user());
            // Si la autenticación es exitosa, redirige al usuario a la página de inicio
            return redirect()->route('home');
        } else {
            // Si la autenticación falla, redirige de vuelta al formulario de inicio de sesión con un mensaje de error
            return redirect()->route('login')->with('error', 'Credenciales incorrectas');
        }
    }
}