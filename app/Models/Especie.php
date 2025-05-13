<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Especie extends Model
{
    protected $table = 'especie'; // Nombre de la tabla en la BD
    protected $fillable = ['nombre']; // Campo 'nombre' en lugar de 'name'

    public function razas()
    {
        return $this->hasMany(Raza::class, 'especie_id'); // Relación con Raza
    }
}
