<?php

namespace App\Http\Controllers;

use App\Models\Licencia;
use App\Models\Categoria;
use App\Models\Marca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use PharIo\Manifest\License;

class LicenciaController extends Controller
{
    /**
     * Muestra todas las licencias.
     */
    public function index()
    {
        try {
           
            /*
            // Retornar la respuesta en formato JSON
            return response()->json([
                'success' => true,
                'data' => $licencias,
            ], 200);*/

            $licencias = Licencia::with(['marca', 'categoria'])->paginate(10);
           
            return view('licencias.index', compact('licencias'));

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener las licencias',
            ], 500);
        }
    }

    /**
     * Guarda una nueva licencia.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'nombre'            => 'required|string|max:255',
                'codigo'            => 'required|string|unique:licencia,codigo',
                'precio'            => 'required|numeric|min:0',
                'precio_mayorista'  => 'required|numeric|min:0',
                'precio_renovacion' => 'nullable|numeric|min:0',
                'trasladable'       => 'required|boolean',
                'caducable'         => 'required|boolean',
                'formateable'       => 'required|boolean',
                'compra_asistida'   => 'required|boolean',
                'compartida'        => 'required|boolean',
                'marca_id'          => 'required|exists:marca,id',
                'categoria_id'      => 'required|exists:categoria,id',
            ]);

            Log::info('Datos validados:', $validatedData);
            
            $licencia = Licencia::create($validatedData);
            
            Log::info('Licencia creada:', $licencia ? $licencia->toArray() : 'No creada');
            
            if (!$licencia) {
                throw new \Exception('No se pudo crear la licencia');
            }

            return redirect()->route('licencias.index')
                                ->with('success', 'Licencia creada exitosamente.');
        } catch (\Exception $e) {
            Log::error('Error al guardar la licencia: ' . $e->getMessage());
            Log::error('Datos intentados: ' . json_encode($request->all()));
            
            return redirect()->back()
                                ->withInput()
                                ->withErrors(['error' => 'Hubo un error al guardar la licencia: ' . $e->getMessage()]);
        }
    }
    

    public function create()
    {
        $marcas = Marca::all();
        $categorias = Categoria::all();
        return view('licencias.create', compact('marcas', 'categorias'));
    }

    public function edit($id)
    {
        $licencia = Licencia::findOrFail($id);
        $marcas = Marca::all();
        $categorias = Categoria::all();
        return view('licencias.edit', compact('licencia', 'marcas', 'categorias'));
    }

    public function show($id)
    {
        $licencia = Licencia::with(['marca', 'categoria'])->findOrFail($id);
        return view('licencias.show', compact('licencia'));
    }

    /**
     * Actualiza una licencia existente.
     */
    public function update(Request $request, $id)
    {
        try {
            // Validar los datos de entrada
            $validatedData = $request->validate([
                'nombre'            => 'required|string|max:255',
                'codigo'            => "required|string|unique:licencia,codigo,{$id}",
                'precio'            => 'required|numeric|min:0',
                'precio_mayorista'  => 'required|numeric|min:0',
                'precio_renovacion' => 'nullable|numeric|min:0',
                'trasladable'       => 'required|boolean',
                'caducable'         => 'required|boolean',
                'formateable'       => 'required|boolean',
                'compra_asistida'   => 'required|boolean',
                'compartida'        => 'required|boolean',
                'marca_id'          => 'required|exists:marca,id',
                'categoria_id'      => 'required|exists:categoria,id',
            ]);

            Log::info('Datos validados para actualización:', $validatedData);

            // Buscar la licencia por ID
            $licencia = Licencia::findOrFail($id);

            // Actualizar los datos de la licencia
            $licencia->update($validatedData);

            Log::info('Licencia actualizada:', $licencia ? $licencia->toArray() : 'No actualizada');

            return redirect()->route('licencias.index')
                            ->with('success', 'Licencia actualizada exitosamente.');
        } catch (\Exception $e) {
            Log::error('Error al actualizar la licencia: ' . $e->getMessage());
            Log::error('Datos intentados: ' . json_encode($request->all()));

            return redirect()->back()
                            ->withInput()
                            ->withErrors(['error' => 'Hubo un error al actualizar la licencia: ' . $e->getMessage()]);
        }
    }


    /**
     * Elimina una licencia.
     */
    public function destroy($id)
    {
        try {
            // Buscar la licencia por ID
            $licencia = Licencia::findOrFail($id);

            // Eliminar la licencia
            $licencia->delete();

            return response()->json([
                'success' => true,
                'message' => 'Licencia eliminada con éxito',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar la licencia',
            ], 500);
        }
    }

    public function search(Request $request)
    {
        $query = Licencia::query();

        if ($request->has('nombre')) {
            $query->where('nombre', 'like', '%' . $request->input('nombre') . '%');
        }

        if ($request->has('marca_id')) {
            $query->where('marca_id', $request->input('marca_id'));
        }

        if ($request->has('categoria_id')) {
            $query->where('categoria_id', $request->input('categoria_id'));
        }

        if ($request->has('precio_min')) {
            $query->where('precio', '>=', $request->input('precio_min'));
        }

        if ($request->has('precio_max')) {
            $query->where('precio', '<=', $request->input('precio_max'));
        }

        $licencias = $query->with(['marca', 'categoria'])->paginate(10);
        return response()->json($licencias);
    }
}
