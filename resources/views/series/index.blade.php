@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Series</h1>
    <a href="{{ route('series.create') }}" class="btn btn-primary mb-3">Crear Serie</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Serie</th>
                <th>Licencia</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($series as $serie)
                <tr>
                    <td>{{ $serie->serie }}</td>
                    <td>{{ $serie->licencia->nombre }}</td>
                    <td>{{ $serie->estado }}</td>
                    <td>
                        <a href="{{ route('series.show', $serie->id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('series.edit', $serie->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('series.destroy', $serie->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
