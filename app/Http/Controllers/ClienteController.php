<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    public function perfil()
    {
        $cliente = auth()->user()->cliente;
        return view('clientes.perfil', compact('cliente'));
    }

    public function guardarPerfil(Request $request)
    {
        $request->validate([
            'nombre' => 'nullable|string|max:255',
            'apellido' => 'nullable|string|max:255',
            'cedula' => 'nullable|unique:clientes,cedula,' . auth()->user()->cliente?->id,
            'telefono' => 'nullable|max:15',
            'direccion' => 'nullable|string|max:255',
        ]);

        $cliente = auth()->user()->cliente()->updateOrCreate([], $request->all());

        return redirect()->route('perfil')->with('success', 'Información actualizada correctamente');
    }
}
