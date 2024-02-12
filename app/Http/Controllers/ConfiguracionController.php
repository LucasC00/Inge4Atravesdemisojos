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

        // Ejecutar la consulta de actualización
        $result = DB::table('usuarios')
            ->where('nombre_usuario', $nombreusuariosession)
            ->update($camposActualizar);

        // Verificar el resultado y realizar la redirección correspondiente
        if ($result !== false) {
            // Actualización exitosa
            if (!empty($nombreUsuario)) {
                session(['nombreusuariosession' => $nombreUsuario]);
            }
            return redirect()->route('home')->with('success', 'Configuraciones del usuario actualizado exitosamente.');
        } else {
            // Error durante la actualización
            return redirect()->route('login')->with('error', 'Error al configurar usuario');
        }
    }
}
