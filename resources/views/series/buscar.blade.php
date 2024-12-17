@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Buscar Series por Licencia</h1>
    <form method="GET" action="{{ route('series.buscarPorLicencia') }}">
        <div class="form-group">
            <label for="licencia_id">Licencia</label>
            <select name="licencia_id" id="licencia_id" class="form-control" required>
                @foreach($licencias as $licencia)
                    <option value="{{ $licencia->id }}">{{ $licencia->nombre }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Buscar</button>
    </form>

    @if(isset($series))
        <h2>Resultados de la Búsqueda</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Serie</th>
                    <th>Licencia</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach($series as $serie)
                    <tr>
                        <td>{{ $serie->serie }}</td>
                        <td>{{ $serie->licencia->nombre }}</td>
                        <td>{{ $serie->estado }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
