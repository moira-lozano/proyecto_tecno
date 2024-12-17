<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Models\Vendedor;
use Illuminate\Http\Request;
=======
use Illuminate\Http\Request;
use App\Models\Vendedor;
>>>>>>> 08935a3c63a169b72add2804f61cee8d6ed33cf4

class VendedorController extends Controller
{
    public function index()
    {
        $vendedores = Vendedor::all();
        return view('vendedores.index', compact('vendedores'));
    }

    public function create()
    {
        return view('vendedores.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'id_usuario' => 'required|exists:usuario,id',
        ]);

        Vendedor::create($request->all());
        return redirect()->route('vendedores.index')->with('success', 'Vendedor creado con éxito.');
    }

    public function show($id)
    {
        $vendedor = Vendedor::findOrFail($id);
        return view('vendedores.show', compact('vendedor'));
    }

    public function edit($id)
    {
        $vendedor = Vendedor::findOrFail($id);
        return view('vendedores.edit', compact('vendedor'));
    }

    public function update(Request $request, $id)
    {
        $vendedor = Vendedor::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:255',
            'id_usuario' => 'required|exists:usuario,id',
        ]);

        $vendedor->update($request->all());
        return redirect()->route('vendedores.index')->with('success', 'Vendedor actualizado con éxito.');
    }

    public function destroy($id)
    {
        Vendedor::destroy($id);
        return redirect()->route('vendedores.index')->with('success', 'Vendedor eliminado con éxito.');
    }
}
