@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white">
            <h4>Bienvenido, {{ Auth::user()->name }}</h4>
        </div>
        <div class="card-body">
            <p class="lead">¡Has iniciado sesión correctamente!</p>

            <hr>
            <a href="{{ route('libros.index') }}" class="btn btn-primary">
                Ver Lista de Libros
            </a>
        </div>
    </div>
</div>
@endsection
