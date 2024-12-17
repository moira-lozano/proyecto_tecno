<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Serie;
use App\Models\Licencia;

class SerieController extends Controller
{
    public function index()
    {
        $series = Serie::with('licencia')->get();
        return response()->json($series);
    }

    public function show($id)
    {
        $serie = Serie::with('licencia', 'activaciones')->findOrFail($id);
        return response()->json($serie);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'serie' => 'required|string|max:255',
            'cantidad_equipos' => 'required|integer|min:1',
            'fecha_compra' => 'required|date',
            'estado' => 'required|string',
            'precio_compra' => 'required|numeric',
            'duracion_cliente' => 'required|string',
            'plazo_vencimiento' => 'required|string',
            'licencia_id' => 'required|exists:licencia,id',
        ]);

        $serie = Serie::create($validatedData);
        return response()->json($serie, 201);
    }

    public function update(Request $request, $id)
    {
        $serie = Serie::findOrFail($id);

        $validatedData = $request->validate([
            'serie' => 'string|max:255',
            'cantidad_equipos' => 'integer|min:1',
            'fecha_compra' => 'date',
            'estado' => 'string',
            'precio_compra' => 'numeric',
            'duracion_cliente' => 'string',
            'plazo_vencimiento' => 'string',
            'licencia_id' => 'exists:licencia,id',
        ]);

        $serie->update($validatedData);
        return response()->json($serie);
    }

    public function destroy($id)
    {
        $serie = Serie::findOrFail($id);
        $serie->delete();
        return response()->json(null, 204);
    }
    // Otros métodos...

    public function buscarPorLicencia(Request $request)
    {
        $request->validate([
            'licencia_id' => 'required|exists:licencia,id',
        ]);

        $licenciaId = $request->input('licencia_id');
        $estado = $request->input('estado', ['sin_usar', 'acabado']); // Estados por defecto

        $series = Serie::where('licencia_id', $licenciaId)
            ->whereIn('estado', (array) $estado)
            ->get();

        return view('notaventa.create', compact('series'));
    }
}
