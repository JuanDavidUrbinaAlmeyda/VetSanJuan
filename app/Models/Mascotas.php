<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mascotas extends Model
{
    protected $table = 'mascotas';
    // Relación con Cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    // Relación con Especie
    public function especie()
    {
        return $this->belongsTo(Especie::class);
    }

    // Relación con Raza
    public function raza()
    {
        return $this->belongsTo(Raza::class);
    }

    // Relación con Sexo
    public function sexo()
    {
        return $this->belongsTo(Sexo::class);
    }

    // Relación con Color
    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    // Relación con Tamaño
    public function tamano()
    {
        return $this->belongsTo(Tamanos::class);
    }
}
