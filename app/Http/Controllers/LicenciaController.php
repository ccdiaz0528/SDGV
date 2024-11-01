<?php

namespace App\Http\Controllers;

use App\Models\Licencia;
use Illuminate\Http\Request;

class LicenciaController extends Controller
{
    public function create()
    {
        return view('licencias.create');
    }

    public function store(Request $request)
    {
       // Valida los datos
    $request->validate([
        'numero_licencia' => 'required|string|max:255',
        'fecha_expedicion' => 'required|date',
        'fecha_vencimiento' => 'required|date|after:fecha_expedicion',
    ]);

    // Crea una nueva licencia
    Licencia::create($request->all());

    // Redirige a donde quieras, por ejemplo:
    return redirect()->route('licencias.index')->with('success', 'Licencia registrada exitosamente.');
    }

    public function index()
    {
        $licencias = Licencia::all();
        return view('licencias.index', compact('licencias'));
    }
}
