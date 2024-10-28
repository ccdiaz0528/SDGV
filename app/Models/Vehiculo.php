<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;

    public function user()
    {
    return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'marca',
        'placa',
        'color',
        'modelo',
        // Agrega aquí otros campos que quieras permitir
    ];

    public function documentacion()
    {
    return $this->hasMany(Documentacion::class);
    }
}
