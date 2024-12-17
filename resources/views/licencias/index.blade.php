@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Licencias</h1>
    <a href="{{ route('licencias.create') }}" class="btn btn-primary mb-3">Nueva Licencia</a>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Código</th>
                    <th>Precio</th>
                    <th>Marca</th>
                    <th>Categoría</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($licencias as $licencia)
                <tr>
                    <td>{{ $licencia->nombre }}</td>
                    <td>{{ $licencia->codigo }}</td>
                    {{-- <td>${{ number_format($licencia->precio, 2) }}</td> --}}
                    {{-- <td>${{ number_format((float) $licencia->precio, 2) }}</td> --}}
                    <td>${{ number_format((float) str_replace(['$', ','], '', $licencia->precio), 2) }}</td>
                    <td>{{ $licencia->marca->nombre }}</td>
                    <td>{{ $licencia->categoria->nombre }}</td>
                    <td>
                        <a href="{{ route('licencias.show', $licencia->id) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('licencias.edit', $licencia->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('licencias.destroy', $licencia->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
 
    
    {{ $licencias->links() }}
</div>
@endsection