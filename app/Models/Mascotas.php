<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mascotas extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nombre_mascota',
        'fecha_nacimiento',
        'cliente_id',
        'especie_id',
        'sexo_id',
        'edad',
        'peso',
        'vacunas',
        'alergias',
        'comentarios',
        'foto'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function especie()
    {
        return $this->belongsTo(Especie::class);
    }


    public function sexo()
    {
        return $this->belongsTo(Sexo::class);
    }


 
    public function citas()
    {
        return $this->hasMany(Citas::class);
    }
}
