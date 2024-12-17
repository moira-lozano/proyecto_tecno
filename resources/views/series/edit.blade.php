@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Serie</h1>
    <form method="POST" action="{{ route('series.update', $serie->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="serie">Serie</label>
            <input type="text" name="serie" id="serie" value="{{ $serie->serie }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="licencia_id">Licencia</label>
            <select name="licencia_id" id="licencia_id" class="form-control" required>
                @foreach($licencias as $licencia)
                    <option value="{{ $licencia->id }}" @if($licencia->id == $serie->licencia_id) selected @endif>
                        {{ $licencia->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="estado">Estado</label>
            <input type="text" name="estado" id="estado" value="{{ $serie->estado }}" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
</div>
@endsection
