<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pregunta;

class PreguntasController extends Controller
{
    public function showPreguntasyrespuestas(){
        return view('preguntasyrespuestas');
    }

    public function index()
    {
        $preguntas = Pregunta::with('usuario')->get();
        return response()->json($preguntas);
    }
}
