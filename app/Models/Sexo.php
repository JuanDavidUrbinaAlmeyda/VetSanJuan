<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Mascotas;

class Sexo extends Model
{
    protected $table = 'sexo';
    public function mascota()
    {
        return $this->belongsTo(Mascotas::class);
    }
    
}
