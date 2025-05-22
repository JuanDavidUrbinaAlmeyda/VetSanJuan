<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $table = 'pago';
    protected $primaryKey = 'id';
    protected $fillable = [
        'metodo_id',
        'venta_id',
        'fecha_pago',
        'monto_pago',
        'referencia_pago',
        'descuento_aplicado'
    ];

    public function metodo()
    {
        return $this->belongsTo(Metodo::class);
    }

    public function venta()
    {
        return $this->belongsTo(Venta::class);
    }
}
