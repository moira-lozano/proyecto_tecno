@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles de Licencia</h1>
    
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $licencia->nombre }}</h5>
            <p><strong>Código:</strong> {{ $licencia->codigo }}</p>
            {{-- <p><strong>Precio:</strong> ${{ number_format($licencia->precio, 2) }}</p> --}}
            <p><strong>Precio:</strong> ${{ number_format((float) str_replace(['$', ','], '', $licencia->precio), 2)}}</p>
            <p><strong>Precio Mayorista:</strong> ${{ number_format((float)str_replace(['$', ','], '', $licencia->precio_mayorista) ?? 0, 2) }}</p>
            <p><strong>Marca:</strong> {{ $licencia->marca->nombre }}</p>
            <p><strong>Categoría:</strong> {{ $licencia->categoria->nombre }}</p>
            
            <h6>Características:</h6>
            <ul>
                <li>Trasladable: {{ $licencia->trasladable ? 'Sí' : 'No' }}</li>
                <li>Caducable: {{ $licencia->caducable ? 'Sí' : 'No' }}</li>
                <li>Formateable: {{ $licencia->formateable ? 'Sí' : 'No' }}</li>
                <li>Compra Asistida: {{ $licencia->compra_asistida ? 'Sí' : 'No' }}</li>
                <li>Compartida: {{ $licencia->compartida ? 'Sí' : 'No' }}</li>
            </ul>
            
            <div class="mt-3">
                <a href="{{ route('licencias.edit', $licencia->id) }}" class="btn btn-warning">Editar</a>
                <a href="{{ route('licencias.index') }}" class="btn btn-secondary">Volver</a>
            </div>
        </div>
    </div>
</div>
@endsection