@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Categoria</h1>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('categorias.update', $categoria->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre">Nombre de la Categoria:</label>
            <input type="text" 
                   name="nombre" 
                   id="nombre" 
                   class="form-control @error('nombre') is-invalid @enderror" 
                   value="{{ old('nombre', $categoria->nombre) }}" 
                   required>
            
            @error('nombre')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
       
        <button type="submit" class="btn btn-primary mt-3">Actualizar</button>
        <a href="{{ route('categorias.index') }}" class="btn btn-secondary mt-3">Cancelar</a>
    </form>
</div>
@endsection