<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Importa la clase Hash
use Illuminate\Support\Facades\DB; // Importa la clase DB

class ConfiguracionController extends Controller
{
    public function showConfiguracion()
    {
        return view('configuracion');
    }

    public function configurarUsuario(Request $request)
    {
        $nombreusuariosession = session('nombreusuariosession');

        // Recibe los datos del formulario enviado por POST
        $nombreUsuario = $request->input('nombreUsuario');
        $correo = $request->input('correo');
        $edad = $request->input('edad');
        $sexo = $request->input('sexo');
        $biografia = $request->input('biografia');
        $discapacidadVisual = $request->has('discapacidadVisual'); // Verifica si el checkbox está marcado
        $contrasena = $request->input('contrasena');

        // Construir la consulta de actualización
        $query = DB::table('usuarios')
            ->where('nombre_usuario', $nombreusuariosession);

        // Agregar condiciones de actualización basadas en si los campos están presentes
        if (!empty($nombreUsuario)) {
            $query->update(['nombre_usuario' => $nombreUsuario]);
        }
        if (!empty($correo)) {
            $query->update(['correo' => $correo]);
        }
        if (!empty($edad)) {
            $query->update(['edad' => $edad]);
        }
        if (!empty($sexo)) {
            $query->update(['sexo' => $sexo]);
        }
        if (!empty($biografia)) {
            $query->update(['biografia' => $biografia]);
        }
        $query->update(['discapacidad_visual' => $discapacidadVisual]); // Actualiza la discapacidad visual
        if (!empty($contrasena)) {
            $query->update(['contrasena' => $contrasena]);
        }

        // Ejecutar la consulta de actualización
        $result = $query->update();

        // Verificar el resultado y realizar la redirección correspondiente
        if ($result !== false) {
            // Actualización exitosa
            if ($nombreusuariosession && $nombreusuariosession !== $nombreUsuario) {
                session(['nombreusuariosession' => $nombreUsuario]);
            }
            return redirect()->route('home')->with('success', 'Configuraciones del usuario actualizado exitosamente.');
        } else {
            // Error durante la actualización
            return redirect()->route('login')->with('error', 'Error al configurar usuario');
        }
    }
}
