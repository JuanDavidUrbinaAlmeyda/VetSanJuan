<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
        'nombre',
        'description',
        'especie',
        'marca',
        'categoria',
        'imagen',
        'edad',
        'destacado',
        'precio',
        'cantidad_inventario',
    ];

    public function presentaciones()
    {
        return $this->hasMany(Presentacion::class);
    }

    public function imagenes()
    {
        return $this->hasMany(Imagen::class, 'producto_id');
    }
    
    public function marca()
    {
        return $this->belongsTo(Marca::class);
    }

}
