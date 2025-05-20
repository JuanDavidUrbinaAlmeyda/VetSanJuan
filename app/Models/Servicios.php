<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Citas;

class Servicios extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
        'tipo_servicio_id'
    ];

    public function citas()
    {
        return $this->hasMany(Citas::class);
    }

    public function tipoServicio()
    {
        return $this->belongsTo(Servicios::class, 'tipo_servicio_id');
    }
}