<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaLicencia extends Model
{
    use HasFactory;
// Especifica el nombre de la tabla si es diferente del nombre del modelo
    protected $table = 'categorias_licencias';

// Asegúrate de que los campos son fillable
    protected $fillable = ['nombre', 'descripcion'];

    public function licencias()
    {
    return $this->belongsToMany(Licencia::class, 'licencia_categoria', 'categoria_id', 'licencia_id');
    }
}
