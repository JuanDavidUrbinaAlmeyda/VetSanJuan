<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CitaServicio extends Model
{
    protected $table = 'citaservicio';
    protected $primaryKey = 'id';

    protected $fillable = [
        'cita_id',
        'servicio_id',
    ];
}
