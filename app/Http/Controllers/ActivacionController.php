<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activacion;


class ActivacionController extends Controller
{
    public function index()
    {
        $activaciones = Activacion::with('serie', 'notaVenta')->get();
        return response()->json($activaciones);
    }

    public function show($id)
    {
        $activacion = Activacion::with('serie', 'notaVenta')->findOrFail($id);
        return response()->json($activacion);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'detalle_nota' => 'required|string|max:255',
            'cantidad_equipos' => 'required|integer|min:1',
            'precio_parcial' => 'required|numeric',
            'renovacion' => 'required|string',
            'serie_id' => 'required|exists:serie,id',
            'notaventa_id' => 'required|exists:notaventa,id',
        ]);

        $activacion = Activacion::create($validatedData);
        return response()->json($activacion, 201);
    }

    public function destroy($id)
    {
        $activacion = Activacion::findOrFail($id);
        $activacion->delete();
        return response()->json(null, 204);
    }
}
