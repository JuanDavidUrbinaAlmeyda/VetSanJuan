<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table = 'venta';
    protected $fillable = ['cliente_id', 'fecha'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'venta_producto')
            ->withPivot('cantidad', 'sub_total')
            ->withTimestamps();
    }

    public function pagos()
    {
        return $this->hasMany(Pago::class);
    }
}
