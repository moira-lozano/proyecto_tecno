<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MarcaController extends Controller
{
    /**
     * Muestra todas las marcas.
     */
    public function index()
    {
        // Obtenemos todas las marcas (si es necesario)
        $marcas = Marca::all();

        // Retornamos la vista con las marcas
        return view('marcas.index', compact('marcas'));
    }

    public function create()
    {
        return view('marcas.create');
    }

    public function edit(Marca $marca)
    {
        return view('marcas.edit', compact('marca'));
    }


    public function store(Request $request)
    {
        // Imprimir todos los datos de la solicitud
        //dd($request->all());
        try {
            $data = $request->validate([
                'nombre' => 'required|string|max:255|unique:marca,nombre' // Cambié a minúsculas
            ]);

            // Añadir log de depuración
            Log::info('Datos validados:', $data);

            $marca = Marca::create($data);

            // Añadir log de depuración
            Log::info('Marca creada:', $marca->toArray());

            return redirect()->route('marcas.index')
                ->with('success', 'Marca creada exitosamente.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Log de errores de validación
            Log::error('Error de validación:', $e->errors());

            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput();
        } catch (\Exception $e) {
            // Log de cualquier otro error
            Log::error('Error al crear marca:', [
                'mensaje' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()->route('marcas.index')
                ->with('error', 'Error al crear la marca: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('marcas.show', compact('marca'));
    }


    /*public function store(Request $request)
    {
        // Imprimir todos los datos de la solicitud
        //dd($request->all());

        try {
            $data = $request->validate([
                'nombre' => 'required|string|max:255|unique:marca,nombre' // Cambié a minúsculas
            ]);

            // Añadir log de depuración
            Log::info('Datos validados:', $data);

            $marca = Marca::create($data);

            // Añadir log de depuración
            Log::info('Marca creada:', $marca->toArray());

            return redirect()->route('marcas.index')
                ->with('success', 'Marca creada exitosamente.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Log de errores de validación
            Log::error('Error de validación:', $e->errors());

            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput();
        } catch (\Exception $e) {
            // Log de cualquier otro error
            Log::error('Error al crear marca:', [
                'mensaje' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()->route('marcas.index')
                ->with('error', 'Error al crear la marca: ' . $e->getMessage());
        }
    }*/

    public function update(Request $request, Marca $marca)
    {
        try {
            // Log de datos recibidos
            Log::info('Datos recibidos para actualizar:', $request->all());
            Log::info('Marca actual:', $marca->toArray());

            $data = $request->validate([
                'nombre' => [
                    'required',
                    'string',
                    'max:255',
                    'unique:marca,nombre,' . $marca->id // Cambié a minúsculas
                ]
            ]);

            // Log de datos validados
            Log::info('Datos validados:', $data);

            $marca->update($data);

            // Log de marca actualizada
            Log::info('Marca actualizada:', $marca->toArray());

            return redirect()->route('marcas.index')
                ->with('success', 'Marca actualizada exitosamente.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Log de errores de validación
            Log::error('Error de validación:', $e->errors());

            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput();
        } catch (\Exception $e) {
            // Log de cualquier otro error
            Log::error('Error al actualizar marca:', [
                'mensaje' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()->route('marcas.index')
                ->with('error', 'Error al actualizar la marca: ' . $e->getMessage());
        }
    }
    /**
     * Elimina la marca especificada.
     */
    public function destroy(Marca $marca)
    {
        try {
            // Eliminar la marca
            $marca->delete();

            return redirect()->route('marcas.index')->with('success', 'Marca eliminada exitosamente.');
        } catch (\Exception $e) {
            return redirect()->route('marcas.index')->with('error', 'Error al eliminar la marca.');
        }
    }
}
