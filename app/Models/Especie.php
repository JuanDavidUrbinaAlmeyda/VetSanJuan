<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especie extends Model
{
    protected $table = 'especie';
    
    protected $fillable = [
        'nombre'
    ];

    public function mascotas()
    {
        return $this->hasMany(Mascotas::class);
    }
}
