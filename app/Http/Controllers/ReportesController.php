<?php

namespace App\Http\Controllers;

use App\Models\Usuario; // Supongamos que este es tu modelo de Usuario
use App\Models\Articulo; // Supongamos que este es tu modelo de Articulo
use App\Models\RecursoExterno; // Supongamos que este es tu modelo de RecursoExterno

class ReportesController extends Controller
{
    public function mostrarTodosLosReportes()
    {
        // Lógica para obtener los últimos 5 usuarios registrados
        $usuarios = Usuario::orderBy('fecha_registro', 'desc')->take(5)->get();
        
        // Lógica para obtener los últimos 5 artículos interesantes
        $articulos = Articulo::orderBy('id', 'desc')->take(5)->get();
        
        // Lógica para obtener los últimos 5 recursos externos
        $recursos = RecursoExterno::orderBy('id', 'desc')->take(5)->get();
        
        return view('reportes', compact('usuarios', 'articulos', 'recursos'));
    }
}