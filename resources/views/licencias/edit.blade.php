@extends('adminlte::page')

@section('content')
<div class="container">
    <h1>Editar Licencia</h1>
    
    <form action="{{ route('licencias.update', $licencia->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $licencia->nombre }}" required>
        </div>
        
        <div class="form-group">
            <label for="codigo">Código</label>
            <input type="text" class="form-control" id="codigo" name="codigo" value="{{ $licencia->codigo }}" required>
        </div>
        
        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="number" class="form-control" id="precio" name="precio" step="0.01" value="{{ $licencia->precio }}" required>
        </div>

        <div class="form-group">
            <label for="precio_mayorista">Precio Mayorista</label>
            <input type="number" class="form-control" id="precio_mayorista" name="precio_mayorista" step="0.01" required>
        </div>

        <div class="form-group">
            <label for="precio_renovacion">Precio Renovacion</label>
            <input type="number" class="form-control" id="precio_renovacion" name="precio_renovacion" step="0.01" required>
        </div>

        <div class="form-group">
            <label for="trasladable">¿Trasladable?</label>
            <select class="form-control" id="trasladable" name="trasladable">
                <option value="1" >Sí</option>
                <option value="0">No</option>
            </select>
        </div>

        <div class="form-group">
            <label for="caducable">¿Caducable?</label>
            <select class="form-control" id="caducable" name="caducable">
                <option value="1">Sí</option>
                <option value="0">No</option>
            </select>
        </div>

        <div class="form-group">
            <label for="formateable">¿Formateable?</label>
            <select class="form-control" id="formateable" name="formateable">
                <option value="1">Sí</option>
                <option value="0">No</option>
            </select>
        </div>

        <div class="form-group">
            <label for="compra_asistida">¿Compra asistida?</label>
            <select class="form-control" id="compra_asistida" name="compra_asistida">
                <option value="1">Sí</option>
                <option value="0">No</option>
            </select>
        </div>

        <div class="form-group">
            <label for="compartida">¿Compartida?</label>
            <select class="form-control" id="compartida" name="compartida">
                <option value="1">Sí</option>
                <option value="0">No</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="marca_id">Marca</label>
            <select class="form-control" id="marca_id" name="marca_id" required>
                @foreach($marcas as $marca)
                    <option value="{{ $marca->id }}" {{ $licencia->marca_id == $marca->id ? 'selected' : '' }}>
                        {{ $marca->nombre }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label for="categoria_id">Categoría</label>
            <select class="form-control" id="categoria_id" name="categoria_id" required>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ $licencia->categoria_id == $categoria->id ? 'selected' : '' }}>
                        {{ $categoria->nombre }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <div>
            <button type="submit" class="btn btn-primary mt-3">Actualizar Licencia</button>
            <a href="{{ route('licencias.index') }}" class="btn btn-secondary mt-3">Volver</a>
        </div>
    </form>
</div>
@endsection