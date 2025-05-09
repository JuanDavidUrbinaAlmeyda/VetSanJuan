<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    protected $table = 'productos';
    use HasFactory;

    public function ventas()
    {
        return $this->belongsToMany(Venta::class, 'venta_producto')
                    ->withPivot('cantidad', 'sub_total');
    }

}
