@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Nota de Venta</h1>
    <form method="POST" action="{{ route('notaventa.update', $nota->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="cliente">Cliente</label>
            <input type="text" name="cliente" id="cliente" value="{{ $nota->cliente }}" class="form-control" required>
        </div>

        <!-- Agregar otros campos necesarios -->

        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
</div>
@endsection
