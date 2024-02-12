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
        $nombreusuariosession= session('nombreusuariosession');
        // Validamos los datos del formulario
        // Recibe los datos del formulario enviado por POST
        $nombreUsuario = $request->input('nombreUsuario');
        $correo = $request->input('correo');
        $edad = $request->input('edad');
        $sexo = $request->input('sexo');
        $biografia = $request->input('biografia');
        $discapacidadVisual = $request->has('discapacidadVisual') ? true : false;
        $contrasena = $request->input('contrasena');

        // Construimos la consulta de actualización
        $result = DB::table('usuarios')
        ->where('nombre_usuario', $nombreusuariosession)
        ->when(!empty($nombreUsuario), function ($query) use ($nombreUsuario) {
            return $query->update(['nombre_usuario' => $nombreUsuario]);
        })
        ->when(!empty($correo), function ($query) use ($correo) {
            return $query->update(['correo' => $correo]);
        })
        ->when(!empty($edad), function ($query) use ($edad) {
            return $query->update(['edad' => $edad]);
        })
        ->when(!empty($sexo), function ($query) use ($sexo) {
            return $query->update(['sexo' => $sexo]);
        })
        ->when(!empty($biografia), function ($query) use ($biografia) {
            return $query->update(['biografia' => $biografia]);
        })
        ->when($request->has('discapacidadVisual'), function ($query) use ($discapacidadVisual) {
            return $query->update(['discapacidad_visual' => $discapacidadVisual]);
        })
        ->when(!empty($contrasena), function ($query) use ($contrasena) {
            return $query->update(['contrasena' => $contrasena]);
        });


        if ($result) {
            // Actualizar el usuario en la sesión si el nombre de usuario cambió
            if ($nombreusuariosession && $nombreusuariosession !== $nombreUsuario) {
                session(['nombreusuariosession' => $nombreUsuario]);
            }
            return redirect()->route('home')->with('success', 'Configuraciones del usuario actualizado exitosamente.');
        } else {
            return redirect()->route('login')->with('error', 'Error al configurar usuario');
        }
    }
}
