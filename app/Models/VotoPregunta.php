<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VotoPregunta extends Model
{
    protected $fillable = ['es_positivo', 'id_pregunta', 'id_usuario'];

    public function pregunta()
    {
        return $this->belongsTo(Pregunta::class, 'id_pregunta');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }
}
