<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'roles'; // Nombre de la tabla en la base de datos

    protected $fillable = ['nombre'];

    // Opcionalmente, puedes definir una relación inversa si lo necesitas
    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'id_rol');
    }
}
