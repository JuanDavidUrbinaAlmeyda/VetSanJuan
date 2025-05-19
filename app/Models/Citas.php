<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Mascotas;
use App\Models\Cliente;
use App\Models\veterinarios;
use App\Models\Servicios;

class Citas extends Model
{
    protected $table = 'citas';
    protected $primaryKey = 'id';
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function mascota()
    {
        return $this->belongsTo(Mascotas::class);
    }

    public function veterinario()
    {
        return $this->belongsTo(veterinarios::class);
    }

    public function servicios()
    {
        return $this->belongsToMany(Servicios::class, 'citaservicio', 'cita_id', 'servicio_id');
    }
    protected $fillable = [
        'fecha',
        'hora',
        'cliente_id',
        'mascota_id',
        'veterinario_id'
    ];
}
