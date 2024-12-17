@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Nota de Venta</h1>

    <!-- Formulario para buscar series -->
    <form method="GET" action="{{ route('series.buscarPorLicencia') }}">
        <div class="form-group">
            <label for="licencia_id">Licencia</label>
            <select name="licencia_id" id="licencia_id" class="form-control">
                @foreach($licencias as $licencia)
                    <option value="{{ $licencia->id }}">{{ $licencia->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="estado">Estado</label>
            <select name="estado" id="estado" class="form-control">
                <option value="sin_usar">Sin Usar</option>
                <option value="acabado">Acabado</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Buscar Series</button>
    </form>

    <!-- Resultados de la búsqueda -->
    @if(isset($series))
        <h2>Series Encontradas</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Serie</th>
                    <th>Licencia</th>
                    <th>Estado</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach($series as $serie)
                    <tr>
                        <td>{{ $serie->serie }}</td>
                        <td>{{ $serie->licencia->nombre }}</td>
                        <td>{{ $serie->estado }}</td>
                        <td>
                            <button class="btn btn-success">Seleccionar</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
