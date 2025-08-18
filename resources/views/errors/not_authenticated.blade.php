@extends('layouts.app')
@section('content')
    <div class="container text-center mt-5">
        <h2 class="text-danger">Acceso denegado</h2>
        <p>Debes iniciar sesión para ver los proyectos.</p>
        <a href="{{ route('login') }}" class="btn btn-primary">Iniciar sesión</a>
    </div>
@endsection
