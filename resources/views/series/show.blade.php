@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles de la Serie</h1>
    <p><strong>Serie:</strong> {{ $serie->serie }}</p>
    <p><strong>Licencia:</strong> {{ $serie->licencia->nombre }}</p>
    <p><strong>Estado:</strong> {{ $serie->estado }}</p>
    <p><strong>Cantidad de Equipos:</strong> {{ $serie->cantidad_equipos }}</p>
    <p><strong>Fecha de Compra:</strong> {{ $serie->fecha_compra }}</p>
    <p><strong>Duración Cliente:</strong> {{ $serie->duracion_cliente }}</p>
    <p><strong>Plazo de Vencimiento:</strong> {{ $serie->plazo_vencimiento }}</p>
</div>
@endsection
