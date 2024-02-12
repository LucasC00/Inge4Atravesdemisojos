<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $table = 'articulos';

    protected $fillable = ['titulo', 'contenido'];

    // Otros métodos o relaciones según sea necesario
}