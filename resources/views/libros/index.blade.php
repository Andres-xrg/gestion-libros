@extends('layouts.app')

@section('title', 'Lista de Libros')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Lista de Libros</h1>
        <a href="{{ route('libros.create') }}" class="btn btn-primary">Agregar Libro</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Autor</th>
                <th>Año</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($libros as $libro)
                <tr>
                    <td>{{ $libro->id }}</td>
                    <td>{{ $libro->titulo }}</td>
                    <td>{{ $libro->autor }}</td>
                    <td>{{ $libro->anio }}</td>
                    <td>{{ $libro->estado }}</td>
                    <td>
                        <a href="{{ route('libros.edit', $libro) }}" class="btn btn-sm btn-warning">Editar</a>

                        <form action="{{ route('libros.destroy', $libro) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('¿Estás seguro?')" class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $libros->links() }}
@endsection
