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
        $documentaciones = Documentacion::with('tipo_documento')->get(); // Cargar documentación con sus tipos
        return view('documentacion.index', compact('documentaciones'));
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
        'fecha_expedicion' => 'required|date|before_or_equal:' . now()->toDateString(),
        'fecha_vencimiento' => 'required|date|after:fecha_expedicion',
        'entidad_emisora' => 'required|string|max:255',
    ], [
        'tipo_documento_id.required' => 'El tipo de documento es obligatorio.',
        'tipo_documento_id.exists' => 'El tipo de documento seleccionado no es válido.',
        'fecha_expedicion.required' => 'La fecha de expedición es obligatoria.',
        'fecha_expedicion.date' => 'La fecha de expedición debe ser una fecha válida.',
        'fecha_expedicion.before_or_equal' => 'La fecha de expedición no puede ser superior a la fecha actual.',
        'fecha_vencimiento.required' => 'La fecha de vencimiento es obligatoria.',
        'fecha_vencimiento.date' => 'La fecha de vencimiento debe ser una fecha válida.',
        'fecha_vencimiento.after' => 'La fecha de vencimiento debe ser posterior a la fecha de expedición.',
        'entidad_emisora.required' => 'La entidad emisora es obligatoria.',
        'entidad_emisora.string' => 'La entidad emisora debe ser un texto válido.',
        'entidad_emisora.max' => 'La entidad emisora no puede tener más de 255 caracteres.',
    ]);

    // Determinar si la documentación está vigente
    $estado = (now()->lessThanOrEqualTo($request->fecha_vencimiento)) ? 'vigente' : 'no vigente';

    $vehiculoId = $request->input('vehiculo_id');
    Documentacion::create([
        'vehiculo_id' => $vehiculoId,
        'tipo_documento_id' => $request->tipo_documento_id,
        'fecha_expedicion' => $request->fecha_expedicion,
        'fecha_vencimiento' => $request->fecha_vencimiento,
        'entidad_emisora' => $request->entidad_emisora,
        'estado' => $estado,
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
        $documento = Documentacion::findOrFail($id); // Encontrar el documento
        $tiposDocumentos = TipoDocumento::all(); // Obtener los tipos de documentos
        return view('documentacion.edit', compact('documento', 'tiposDocumentos')); // Retornar la vista de edición
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'tipo_documento_id' => 'required|exists:tipo_documento,id',
            'fecha_expedicion' => 'required|date|before_or_equal:' . now()->toDateString(),
            'fecha_vencimiento' => 'required|date|after:fecha_expedicion',
            'entidad_emisora' => 'required|string|max:30',
        ], [
            'tipo_documento_id.required' => 'El tipo de documento es obligatorio.',
            'tipo_documento_id.exists' => 'El tipo de documento seleccionado no es válido.',
            'fecha_expedicion.required' => 'La fecha de expedición es obligatoria.',
            'fecha_expedicion.date' => 'La fecha de expedición debe ser una fecha válida.',
            'fecha_expedicion.before_or_equal' => 'La fecha de expedición no puede ser superior a la fecha actual.',
            'fecha_vencimiento.required' => 'La fecha de vencimiento es obligatoria.',
            'fecha_vencimiento.date' => 'La fecha de vencimiento debe ser una fecha válida.',
            'fecha_vencimiento.after' => 'La fecha de vencimiento debe ser posterior a la fecha de expedición.',
            'entidad_emisora.required' => 'La entidad emisora es obligatoria.',
            'entidad_emisora.string' => 'La entidad emisora debe ser un texto válido.',
            'entidad_emisora.max' => 'La entidad emisora no puede tener más de 30 caracteres.',
        ]);

        // Determinar si la documentación está vigente
        $estado = (now()->lessThanOrEqualTo($request->fecha_vencimiento)) ? 'vigente' : 'no vigente';

        // Buscar el documento y actualizar sus datos
        $documento = Documentacion::findOrFail($id);
        $documento->update([
            'tipo_documento_id' => $request->tipo_documento_id,
            'fecha_expedicion' => $request->fecha_expedicion,
            'fecha_vencimiento' => $request->fecha_vencimiento,
            'entidad_emisora' => $request->entidad_emisora,
            'estado' => $estado,
        ]);

        return redirect()->route('vehiculos.index')->with('success', 'Documentación actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $documentacion = Documentacion::findOrFail($id);
    $documentacion->delete();

    return redirect()->route('vehiculos.index')->with('success', 'Documentación eliminada exitosamente.');
}
}
