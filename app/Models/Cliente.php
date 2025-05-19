<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Mascotas;
use App\Models\Citas;

class Cliente extends Model
{
    protected $table = 'clientes';
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function mascotas()
    {
        return $this->hasMany(Mascotas::class);
    }

    public function citas()
    {
        return $this->hasMany(Citas::class);
    }
    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'telefono',
        'direccion',
        'ciudad',
        'ciudad_id',
        'user_id',
    ];
}
