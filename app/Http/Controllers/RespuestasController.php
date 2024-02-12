<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Respuesta;
use App\Models\VotoRespuesta;

class RespuestasController extends Controller
{
    public function index($id_pregunta)
    {
        $respuestas = Respuesta::with(['usuario', 'votos_respuestas'])->where('id_pregunta', $id_pregunta)->get();
        return response()->json($respuestas);
    }
}
