<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
        'nombre',
        'description',
        'precio_unitario',
        'cantidad_inventario',
        'categoria',
        'marca',
        'subcategoria',
        'url_imagen'
    ];

    public function presentaciones()
    {
        return $this->hasMany(Presentacion::class);
    }
}

