<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerfilController extends Controller
{
    public function index()
    {
        $cliente = Auth::user()->cliente;

        return view('clientes.perfil', compact('cliente'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'nullable|string|max:255',
            'cedula' => 'required|string|max:20|unique:clientes,cedula,' . Auth::user()->cliente->id,
            'telefono' => 'required|numeric|min:1000000000|max:9999999999',
            'direccion' => 'nullable|string|max:255',

        ],[ 'cedula.unique' => 'La cédula ya está registrada. Por favor, ingrese un número diferente.',
            'telefono.numeric' => 'El campo teléfono debe contener solo números.',
            'telefono.min' => 'El campo telefono debe tener minimo 10 digitos',
            'telefono.max' => 'El campo telefono debe tener maximo 10 digitos']);

        $cliente = Auth::user()->cliente;
        $cliente->update($request->only('nombre', 'apellido', 'cedula', 'telefono', 'direccion'));

        return redirect()->route('perfil')->with('success', 'Información actualizada con éxito!');
    }



}
