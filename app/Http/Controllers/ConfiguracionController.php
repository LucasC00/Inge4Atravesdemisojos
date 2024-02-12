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

        // Construir el array de campos a actualizar
        $camposActualizar = [];
        if (!empty($nombreUsuario)) {
            $camposActualizar['nombre_usuario'] = $nombreUsuario;
        }
        if (!empty($correo)) {
            $camposActualizar['correo'] = $correo;
        }
        if (!empty($edad)) {
            $camposActualizar['edad'] = $edad;
        }
        if (!empty($sexo)) {
            $camposActualizar['sexo'] = $sexo;
        }
        if (!empty($biografia)) {
            $camposActualizar['biografia'] = $biografia;
        }
        $camposActualizar['discapacidad_visual'] = $discapacidadVisual;
        if (!empty($contrasena)) {
            $camposActualizar['contrasena'] = $contrasena;
        }
        // Verificar si hay campos para actualizar
        if (empty($camposActualizar)) {
            return redirect()->route('home')->with('warning', 'No se proporcionaron campos para actualizar.');
        }

        // Actualizar los datos del usuario en la base de datos
        $result = DB::table('usuarios')
            ->where('nombre_usuario', $nombreusuariosession)
            ->update($camposActualizar);

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
