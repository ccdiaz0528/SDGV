<?php

namespace App\Http\Controllers;

use App\Models\Documentacion;
use App\Models\TipoDocumento;
use App\Models\Vehiculo;
use Illuminate\Http\Request;

class DocumentacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($vehiculoId)
    {
        // Asegúrate de que el ID del vehículo se está pasando correctamente
        $vehiculo = Vehiculo::find($vehiculoId);
        $tiposDocumentos = TipoDocumento::all(); // Obtener tipos de documentos

        return view('documentacion.create', compact('vehiculo', 'tiposDocumentos'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tipo_documento_id' => 'required|exists:tipo_documento,id',
            'fecha_expedicion' => 'required|date',
            'fecha_vencimiento' => 'required|date|after:fecha_expedicion',
            'entidad_emisora' => 'required|string|max:255',
        ]);

        // Determinar si la documentación está vigente
        $estado = (now()->lessThanOrEqualTo($request->fecha_vencimiento)) ? 'vigente' : 'no vigente';

        $vehiculoId = $request->input('vehiculo_id');
        Documentacion::create([
            'vehiculo_id' => $vehiculoId, // Asegúrate de definir $vehiculoId
            'tipo_documento_id' => $request->tipo_documento_id,
            'fecha_expedicion' => $request->fecha_expedicion,
            'fecha_vencimiento' => $request->fecha_vencimiento,
            'entidad_emisora' => $request->entidad_emisora,
            'estado' => $estado, // Aquí se establece el estado según la fecha
        ]);

        return redirect()->route('vehiculos.index')->with('success', 'Documentación registrada exitosamente.');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
