<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class RecursosController extends Controller
{
    public function mostrarRecursosExternos()
    {
        $recursos = $this->obtenerRecursosExternos();

        return view('recursos.externos', ['recursos' => $recursos]);
    }

    private function obtenerRecursosExternos()
    {
        return DB::table('recursos_externos')
            ->select('titulo', 'enlace', 'descripcion')
            ->get();
    }
}