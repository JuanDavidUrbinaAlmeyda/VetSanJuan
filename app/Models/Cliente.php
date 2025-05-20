<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Citas;
use App\Models\Mascotas;
use App\Models\User;
class Cliente extends Model
{
    protected $table = 'clientes';
    use HasFactory;
    protected $fillable = ['user_id', 'nombre', 'apellido', 'telefono', 'ciudad_id', 'direccion', 'email'];
    public function mascotas()
    {
        return $this->hasMany(Mascotas::class);
    }

    public function citas()
    {
        return $this->hasMany(Citas::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
