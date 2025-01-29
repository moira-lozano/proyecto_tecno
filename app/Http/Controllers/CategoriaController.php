<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {

            $categorias = Categoria::all();
            return view('categorias.index', compact('categorias')); // Para vistas

        } catch (\Exception $e) {
            return redirect()->route('categorias.index')->with('error', 'Error al obtener las categorias.');
        }
    }

    public function create()
    {
        return view('categorias.create');
    }

    public function edit(Categoria $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255'
        ]);
    
        Categoria::create($data);
    
        return redirect()->route('categorias.index')->with('success', 'Categoria creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
    {
        return view('categoria.show', compact('categoria'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categoria $categoria)
    {
        try {
            // Log de datos recibidos
            Log::info('Datos recibidos para actualizar:', $request->all());
            Log::info('Categoria actual:', $categoria->toArray());
    
            $data = $request->validate([
                'nombre' => [
                    'required',
                    'string',
                    'max:255',
                    'unique:categoria,nombre,' . $categoria->id // Cambié a minúsculas
                ]
            ]);
           
            // Log de datos validados
            Log::info('Datos validados:', $data);
    
            $categoria->update($data);
           
            // Log de categoria actualizada
            Log::info('categoria actualizada:', $categoria->toArray());
           
            return redirect()->route('categorias.index')
                ->with('success', 'Categoria actualizada exitosamente.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Log de errores de validación
            Log::error('Error de validación:', $e->errors());
    
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput();
        } catch (\Exception $e) {
            // Log de cualquier otro error
            Log::error('Error al actualizar la categoria:', [
                'mensaje' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
    
            return redirect()->route('categorias.index')
                ->with('error', 'Error al actualizar la categoria: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria)
    {
        try {
            // Eliminar la marca
            $categoria->delete();

            return redirect()->route('categorias.index')->with('success', 'Categoria eliminada exitosamente.');
        } catch (\Exception $e) {
            return redirect()->route('categorias.index')->with('error', 'Error al eliminar la categoria.');
        }
    }
}
