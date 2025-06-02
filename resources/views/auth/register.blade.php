@extends('layouts.app')

@section('content')
<div class="auth-bg">
    <div class="auth-card">
        <h2>Registro</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-3">
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required placeholder="Nombre completo">
            </div>

            <div class="mb-3">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="Correo electrónico">
            </div>

            <div class="mb-3">
                <input id="password" type="password" class="form-control" name="password" required placeholder="Contraseña">
            </div>

            <div class="mb-3">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirmar contraseña">
            </div>

            <button type="submit">Registrarse</button>

            <a href="{{ route('login') }}">¿Ya tienes cuenta? Inicia sesión</a>
        </form>
    </div>
</div>
@endsection
