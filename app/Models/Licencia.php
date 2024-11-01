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
        'fecha_vencimiento',   // Campo para la fecha de vencimiento
        'estado',             // Campo para el estado (vigente o no)
    ];

    public function categorias()
    {
        return $this->belongsToMany(CategoriaLicencia::class, 'licencia_categoria', 'licencia_id', 'categoria_id');
    }
}
