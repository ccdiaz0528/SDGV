<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    use HasFactory;
    
    protected $table = 'tipo_documento'; // Asegúrate de que este sea el nombre correcto de la tabla

    protected $fillable = ['nombre']; // Agrega los campos que deseas poder llenar
}
