<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table = 'venta';
    use HasFactory;

    public function productos()
    {
        return $this->belongsToMany(Productos::class, 'venta_producto')
                    ->withPivot('cantidad', 'sub_total');
    }

    public function envio()
    {
        return $this->hasOne(Envio::class);
    }

}
