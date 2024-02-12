<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios';

    protected $fillable = [
        'nombre_usuario', 'nombre_real', 'correo', 'contrasena', 'discapacidad_visual', 'sexo',
        'edad', 'fecha_registro', 'ultimo_acceso', 'biografia', 'numero_telefono', 'ubicacion', 'id_rol'
    ];

    // Relaciones
    public function preguntas()
    {
        return $this->hasMany(Pregunta::class, 'id_usuario');
    }

    public function respuestas()
    {
        return $this->hasMany(Respuesta::class, 'id_usuario');
    }

    // Otros métodos o relaciones según sea necesario
}
