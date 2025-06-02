@extends('layouts.app')

@section('title', 'Editar Libro')

@section('content')
    <h1 class="mb-4">Editar Libro: {{ $libro->titulo }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>¡Atención!</strong> Corrige los errores a continuación:
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('libros.update', $libro) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" name="titulo" class="form-control" value="{{ old('titulo', $libro->titulo) }}" required>
        </div>

        <div class="mb-3">
            <label for="autor" class="form-label">Autor</label>
            <input type="text" name="autor" class="form-control" value="{{ old('autor', $libro->autor) }}" required>
        </div>

        <div class="mb-3">
            <label for="anio" class="form-label">Año</label>
            <input type="number" name="anio" class="form-control" value="{{ old('anio', $libro->anio) }}" required>
        </div>

        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <select name="estado" class="form-select" required>
                <option value="nuevo" {{ old('estado', $libro->estado) == 'nuevo' ? 'selected' : '' }}>Nuevo</option>
                <option value="usado" {{ old('estado', $libro->estado) == 'usado' ? 'selected' : '' }}>Usado</option>
                <option value="agotado" {{ old('estado', $libro->estado) == 'agotado' ? 'selected' : '' }}>Agotado</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('libros.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
