<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Citas;

class Peluquero extends Model
{
    protected $table = 'peluqueros';
    use HasFactory;
    protected $fillable = ['nombre', 'telefono', 'correo_electronico', 'horario']; // ajusta según tus columnas

    public function citas()
    {
        return $this->hasMany(Citas::class);
    }
}