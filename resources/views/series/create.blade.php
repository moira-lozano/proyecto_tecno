@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Serie</h1>
    <form method="POST" action="{{ route('series.store') }}">
        @csrf

        <div class="form-group">
            <label for="serie">Serie</label>
            <input type="text" name="serie" id="serie" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="licencia_id">Licencia</label>
            <select name="licencia_id" id="licencia_id" class="form-control" required>
                @foreach($licencias as $licencia)
                    <option value="{{ $licencia->id }}">{{ $licencia->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="estado">Estado</label>
            <input type="text" name="estado" id="estado" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Crear</button>
    </form>
</div>
@endsection
