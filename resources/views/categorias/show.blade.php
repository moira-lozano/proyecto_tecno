@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalle de la Categoria</h1>
        <p><strong>Nombre:</strong> {{ $categoria->nombre }}</p>
        <a href="{{ route('categorias.index') }}" class="btn btn-primary">Volver al listado</a>
    </div>
@endsection