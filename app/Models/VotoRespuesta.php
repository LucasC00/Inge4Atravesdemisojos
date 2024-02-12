<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VotoRespuesta extends Model
{
    protected $fillable = ['es_positivo', 'id_respuesta', 'id_usuario'];

    public function respuesta()
    {
        return $this->belongsTo(Respuesta::class, 'id_respuesta');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }
}
