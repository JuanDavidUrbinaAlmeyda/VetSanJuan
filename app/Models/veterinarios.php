<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Citas;
class veterinarios extends Model
{
    protected $table = 'veterinarios';
    use HasFactory;
    protected $fillable = ['nombre', 'especialidad', 'telefono']; // ajusta según tus columnas

    public function citas()
    {
        return $this->hasMany(Citas::class);
    }
}
