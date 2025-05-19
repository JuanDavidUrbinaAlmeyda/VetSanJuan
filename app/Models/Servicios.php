<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Citas;

class Servicios extends Model
{
    protected $table = 'servicios';
    protected $primaryKey = 'id';
    public function citas()
    {
        return $this->belongsToMany(Citas::class, 'citaservicio', 'servicio_id', 'cita_id');
    }
}
