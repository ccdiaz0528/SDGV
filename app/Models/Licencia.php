<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Licencia extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_licencia',    // Campo para el número de licencia
        'fecha_expedicion',   // Campo para la fecha de expedición
        'fecha_vencimiento',
        'estado',  
    ];
}
