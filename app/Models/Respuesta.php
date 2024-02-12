<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    protected $fillable = ['descripcion', 'votos', 'id_pregunta', 'id_usuario'];

    public function pregunta()
    {
        return $this->belongsTo(Pregunta::class, 'id_pregunta');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }

    public function votos_respuestas()
    {
        return $this->hasMany(VotoRespuesta::class, 'id_respuesta');
    }
}
