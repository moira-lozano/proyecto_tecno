<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NotaVenta;
use App\Models\Licencia;

class NotaVentaController extends Controller
{
    public function index()
    {
        $notas = NotaVenta::paginate(10);
        return view('notaventa.index', compact('notas'));
    }

    public function create()
    {
        $licencias = Licencia::all();
        return view('notaventa.create', compact('licencias'));
    }

    public function store(Request $request)
    {
        $nota = NotaVenta::create($request->all());
        return redirect()->route('notaventa.index')->with('success', 'Nota de venta creada exitosamente.');
    }

    public function show($id)
    {
        $nota = NotaVenta::findOrFail($id);
        return view('notaventa.show', compact('nota'));
    }

    public function edit($id)
    {
        $nota = NotaVenta::findOrFail($id);
        return view('notaventa.edit', compact('nota'));
    }

    public function update(Request $request, $id)
    {
        $nota = NotaVenta::findOrFail($id);
        $nota->update($request->all());
        return redirect()->route('notaventa.index')->with('success', 'Nota de venta actualizada exitosamente.');
    }

    public function destroy($id)
    {
        $nota = NotaVenta::findOrFail($id);
        $nota->delete();
        return redirect()->route('notaventa.index')->with('success', 'Nota de venta eliminada exitosamente.');
    }
}
