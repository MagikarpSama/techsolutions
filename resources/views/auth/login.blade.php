@extends('layouts.app')
@section('content')
<div class="container" style="max-width: 400px;">
    <h2 class="mb-4">Iniciar Sesión</h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Ingresar</button>
        <div class="mt-3 text-center">
            <span>¿No tienes cuenta?</span>
            <a href="{{ route('register') }}" class="btn btn-link">Regístrate aquí</a>
        </div>
    </form>
</div>
@endsection
