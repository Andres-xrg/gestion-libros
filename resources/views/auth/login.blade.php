@extends('layouts.app')

@section('content')
<div class="auth-bg">
    <div class="auth-card">
        <h2>Iniciar Sesión</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="Correo electrónico">
            </div>

            <div class="mb-3">
                <input id="password" type="password" class="form-control" name="password" required placeholder="Contraseña">
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" name="remember" id="remember">
                <label class="form-check-label" for="remember">Recordarme</label>
            </div>

            <button type="submit">Ingresar</button>

            <a href="{{ route('register') }}">¿No tienes cuenta? Regístrate</a>
        </form>
    </div>
</div>
@endsection
