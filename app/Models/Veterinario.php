<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Citas;
class Veterinario extends Model
{
    protected $table = 'veterinarios';
    use HasFactory;
    protected $fillable = ['nombre', 'especialidad', 'correo_electronico', 'horario', 'telefono', 'licencia_profesional', 'fecha_licencia']; // ajusta según tus columnas

    public function citas()
    {
        return $this->hasMany(Citas::class);
    }
}
