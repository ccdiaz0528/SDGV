<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\CategoriaLicencia;
use App\Models\Licencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LicenciaController extends Controller
{
    public function create()
    {
        $categorias = CategoriaLicencia::all(); // Obtener todas las categorías
        return view('licencias.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'numero_licencia' => 'required|string|regex:/^[0-9]+$/|min:8|max:10|unique:licencias',
            'fecha_expedicion' => 'required|date|before:fecha_vencimiento',
            'fecha_vencimiento' => 'required|date|after:fecha_expedicion',
            'categorias' => 'required|array|max:3', // Validación: máximo 3 categorías
            'categorias.*' => 'exists:categorias_licencias,id',
        ], [
            'numero_licencia.regex' => 'El número de licencia solo puede contener dígitos.',
            'numero_licencia.required' => 'El número de licencia es obligatorio.',
            'numero_licencia.max' => 'El número de licencia es de máximo 10 dígitos.',
            'numero_licencia.min' => 'El número de licencia es de mínimo 8 dígitos.',
            'numero_licencia.unique' => 'El número de licencia ya está en uso.',
            'fecha_expedicion.required' => 'La fecha de expedición es obligatoria.',
            'fecha_expedicion.before' => 'La fecha de expedición debe ser anterior a la fecha de vencimiento.',
            'fecha_vencimiento.required' => 'La fecha de vencimiento es obligatoria.',
            'fecha_vencimiento.after' => 'La fecha de vencimiento debe ser posterior a la fecha de expedición.',
            'categorias.required' => 'Debes seleccionar al menos una categoría.',
            'categorias.max' => 'No puedes seleccionar más de 3 categorías para una licencia.',
            'categorias.*.exists' => 'Una de las categorías seleccionadas no es válida.',
        ]);

        $licencia = new Licencia($request->all());
        $licencia->user_id = auth()->id();
        $licencia->estado = $request->fecha_vencimiento >= now() ? 'Vigente' : 'No Vigente';
        $licencia->save();

        if ($request->has('categorias')) {
            $licencia->categorias()->attach($request->categorias);
        }

        return redirect()->route('licencias.index')->with('success', 'Licencia registrada exitosamente.');
    }

    public function index()
    {
        $licencias = Licencia::with('categorias')
                    ->where('user_id', auth()->id())
                    ->get();

        return view('licencias.index', compact('licencias'));
    }

    public function edit($id)
    {
        $licencia = Licencia::where('user_id', auth()->id())->findOrFail($id);
        $categorias = CategoriaLicencia::all();

        return view('licencias.edit', compact('licencia', 'categorias'));
    }

    public function update(Request $request, $id)
    {
        $licencia = Licencia::where('user_id', auth()->id())->findOrFail($id);

        $request->validate([
            'numero_licencia' => 'required|string|regex:/^[0-9]+$/|min:8|max:10|unique:licencias,numero_licencia,' . $licencia->id,
            'fecha_expedicion' => 'required|date|before:fecha_vencimiento',
            'fecha_vencimiento' => 'required|date|after:fecha_expedicion',
            'categorias' => 'required|array|max:3', // Validación: máximo 3 categorías
            'categorias.*' => 'exists:categorias_licencias,id',
        ], [
            'numero_licencia.regex' => 'El número de licencia solo puede contener dígitos.',
            'numero_licencia.required' => 'El número de licencia es obligatorio.',
            'numero_licencia.max' => 'El número de licencia es de máximo 10 dígitos.',
            'numero_licencia.min' => 'El número de licencia es de mínimo 8 dígitos.',
            'numero_licencia.unique' => 'El número de licencia ya está en uso.',
            'fecha_expedicion.required' => 'La fecha de expedición es obligatoria.',
            'fecha_expedicion.before' => 'La fecha de expedición debe ser anterior a la fecha de vencimiento.',
            'fecha_vencimiento.required' => 'La fecha de vencimiento es obligatoria.',
            'fecha_vencimiento.after' => 'La fecha de vencimiento debe ser posterior a la fecha de expedición.',
            'categorias.required' => 'Debes seleccionar al menos una categoría.',
            'categorias.max' => 'No puedes seleccionar más de 3 categorías para una licencia.',
            'categorias.*.exists' => 'Una de las categorías seleccionadas no es válida.',
        ]);

        $data = [
            'numero_licencia' => $request->numero_licencia,
            'fecha_expedicion' => $request->fecha_expedicion,
            'fecha_vencimiento' => $request->fecha_vencimiento,
            'estado' => $request->fecha_vencimiento >= now() ? 'Vigente' : 'No Vigente',
        ];

        $licencia->update($data);
        $licencia->categorias()->sync($request->categorias);

        return redirect()->route('licencias.index')->with('success', 'Licencia actualizada con éxito.');
    }

    public function destroy($id)
    {
        $licencia = Licencia::where('user_id', auth()->id())->findOrFail($id);
        $licencia->delete();

        return redirect()->route('licencias.index')->with('success', 'Licencia eliminada correctamente');
    }

    public function generarDuplicado($id)
    {
        $licencia = Licencia::where('user_id', auth()->id())->with('categorias')->findOrFail($id);

        $diasRestantes = now()->diffInDays($licencia->fecha_vencimiento, false);

        $contenido = "Duplicado de Licencia de Tránsito\n\n";
        $contenido .= "Número de Licencia: {$licencia->numero_licencia}\n";
        $contenido .= "Fecha de Expedición: {$licencia->fecha_expedicion}\n";
        $contenido .= "Fecha de Vencimiento: {$licencia->fecha_vencimiento}\n";
        $contenido .= "Días Restantes: " . ($diasRestantes >= 0 ? $diasRestantes : "Vencido") . "\n";
        $contenido .= "Estado: {$licencia->estado}\n";
        $contenido .= "Categorías:\n";

        foreach ($licencia->categorias as $categoria) {
            $contenido .= "- {$categoria->nombre}: {$categoria->descripcion}\n";
        }

        $nombreArchivo = 'duplicado_licencia_' . $licencia->numero_licencia . '.txt';
        Storage::disk('public')->put($nombreArchivo, $contenido);

        return response()->download(storage_path("app/public/{$nombreArchivo}"))->deleteFileAfterSend(true);
    }
}
