<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Importa la clase Hash
use Illuminate\Support\Facades\DB; // Importa la clase DB

class RegistroController extends Controller
{
    public function showRegistro()
    {
        return view('registro');
    }

    public function registrarUsuario(Request $request)
    {
        // Validamos los datos del formulario
        $nombreUsuario = $request->input('nombreUsuario');
        $nombreReal = $request->input('nombreReal');
        $correo = $request->input('correo');
        $contrasena = $request->input('contrasena');
        $discapacidadVisual = $request->has('discapacidadVisual') ? true : false;
        $sexo = $request->input('sexo');
        $edad = $request->input('edad');
        $numero_telefono = $request->input('biografia');
        $telefono = $request->input('telefono');
        $ubicacion = $request->input('ubicacion');
        $rol = $request->input('rol');

        // Insertar el nuevo usuario en la base de datos
        $result = DB::table('usuarios')->insert([
            'nombre_usuario' => $nombreUsuario,
            'nombre_real' => $nombreReal,
            'correo' => $correo,
            'contrasena' => Hash::make($contrasena), // Se hashea la contraseña antes de almacenarla
            'discapacidad_visual' => $discapacidadVisual, // Convierte a booleano
            'sexo' => $sexo,
            'edad' => $edad,
            'biografia' => $biografia,
            'numero_telefono' => $telefono,
            'ubicacion' => $ubicacion,
            'id_rol' => $rol,
            'fecha_registro' => now(), // Utiliza la fecha y hora actual
        ]);

        if ($result) {
            return redirect()->route('login')->with('success', 'Usuario registrado exitosamente. Por favor, inicia sesión.');
        } else {
            return redirect()->route('registro-usuario')->with('error', 'Error al registrar usuario');
        }
    }
}
