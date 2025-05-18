<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Presentacion extends Model
{
    protected $table = 'presentaciones';
    
    protected $fillable = [
        'producto_id',
        'nombre',
        'precio_unitario',
        'cantidad_inventario',
        'imagen'
    ];

    public function producto(): BelongsTo
    {
        return $this->belongsTo(Producto::class);
    }
}