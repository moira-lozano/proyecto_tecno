@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles de la Nota de Venta</h1>
    <p><strong>ID:</strong> {{ $nota->id }}</p>
    <p><strong>Cliente:</strong> {{ $nota->cliente }}</p>
    <p><strong>Total:</strong> {{ $nota->total }}</p>
    <p><strong>Fecha:</strong> {{ $nota->created_at }}</p>

    <!-- Agregar otros detalles según sea necesario -->
</div>
@endsection
