@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalle de la Marca</h1>
        <p><strong>Nombre:</strong> {{ $marca->nombre }}</p>
        <a href="{{ route('marcas.index') }}" class="btn btn-primary">Volver al listado</a>
    </div>
@endsection

