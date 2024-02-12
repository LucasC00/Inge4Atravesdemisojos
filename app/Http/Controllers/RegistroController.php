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
        $request->validate([
            'nombreUsuario' => 'required|unique:usuarios,nombre_usuario',
            'nombreReal' => 'required',
            'correo' => 'required|email|unique:usuarios,correo',
            'contrasena' => 'required',
            'discapacidadVisual' => 'nullable|boolean',
            'sexo' => 'required',
            'edad' => 'nullable|integer',
            'biografia' => 'nullable|string',
            'telefono' => 'nullable|string',
            'ubicacion' => 'nullable|string',
            'rol' => 'required|numeric',
        ]);

        // Insertar el nuevo usuario en la base de datos
        $result = DB::table('usuarios')->insert([
            'nombre_usuario' => $request->nombreUsuario,
            'nombre_real' => $request->nombreReal,
            'correo' => $request->correo,
            'contrasena' => Hash::make($request->contrasena), // Se hashea la contraseña antes de almacenarla
            'discapacidad_visual' => $request->has('discapacidadVisual') ? true : false, // Convierte a booleano
            'sexo' => $request->sexo,
            'edad' => $request->edad,
            'biografia' => $request->biografia,
            'numero_telefono' => $request->telefono,
            'ubicacion' => $request->ubicacion,
            'id_rol' => $request->rol,
            'fecha_registro' => now(), // Utiliza la fecha y hora actual
        ]);

        if ($result) {
            return redirect()->route('login')->with('success', 'Usuario registrado exitosamente. Por favor, inicia sesión.');
        } else {
            return redirect()->route('registro-usuario')->with('error', 'Error al registrar usuario');
        }
    }
}
