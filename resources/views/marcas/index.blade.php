@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Marcas</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('marcas.create') }}" class="btn btn-primary mb-4">Crear Nueva Marca</a>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead class="thead-light">
                <tr>
                    <th style="width: 10%;">NRO</th>
                    <th style="width: 50%;">Nombre</th>
                    <th style="width: 40%;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($marcas as $marca)
                <tr>
                    <td>{{ $marca->id }}</td>
                    <td>{{ $marca->nombre }}</td>
                    <td>
                        <a href="{{ route('marcas.edit', $marca->id) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('marcas.destroy', $marca->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
