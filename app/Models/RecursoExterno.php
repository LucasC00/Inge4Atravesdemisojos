<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecursoExterno extends Model
{
    protected $table = 'recursos_externos';

    protected $fillable = ['titulo', 'enlace', 'descripcion'];

    // Otros métodos o relaciones según sea necesario
}