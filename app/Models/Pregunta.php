<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    protected $fillable = ['titulo', 'descripcion', 'id_usuario', 'votos'];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }

    public function votosPositivos()
    {
        return $this->votos_preguntas()->where('es_positivo', true)->count();
    }

    public function votosNegativos()
    {
        return $this->votos_preguntas()->where('es_positivo', false)->count();
    }

    public function votos_preguntas()
    {
        return $this->hasMany(VotoPregunta::class, 'id_pregunta');
    }
}
