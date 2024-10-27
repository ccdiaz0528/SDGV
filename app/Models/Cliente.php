<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'nombre', 'apellido', 'cedula', 'telefono', 'direccion'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
