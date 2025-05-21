<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Cliente;
use App\Models\Mascotas;
use App\Models\Veterinario;
use App\Models\Servicios;

class Citas extends Model
{
    protected $fillable = [
        'fecha',
        'hora',
        'cliente_id',
        'mascota_id',
        'tipo_servicio_id',
        'veterinario_id',
        'peluquero_id',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function mascota()
    {
        return $this->belongsTo(Mascotas::class);
    }

    public function servicio()
    {
        return $this->belongsTo(Servicios::class, 'tipo_servicio_id');
        // especificas el nombre de la FK en caso que no sea servicio_id
    }

    public function veterinario()
    {
        return $this->belongsTo(Veterinario::class);
    }

    public function peluquero()
    {
        return $this->belongsTo(Peluquero::class);
    }
}
