<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'nombre_usuario',
        'nombre_real',
        'correo',
        'contrasena',
        'discapacidad_visual',
        'sexo',
        'edad',
        'fecha_registro',
        'ultimo_acceso',
        'biografia',
        'numero_telefono',
        'ubicacion',
        'id_rol'
    ];

    // Definición de relaciones
    public function rol()
    {
        return $this->belongsTo(Rol::class, 'id_rol');
    }
}
