@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Detalle del Proyecto</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $proyecto->nombre }}</h5>
            <p class="card-text"><strong>Fecha de Inicio:</strong> {{ $proyecto->fecha_inicio }}</p>
            <p class="card-text"><strong>Estado:</strong> {{ $proyecto->estado }}</p>
            <p class="card-text"><strong>Responsable:</strong> {{ $proyecto->responsable }}</p>
            <p class="card-text"><strong>Monto:</strong> {{ $proyecto->monto }}</p>
            <a href="{{ route('proyectos.edit', $proyecto) }}" class="btn btn-warning">Editar</a>
            <a href="{{ route('proyectos.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
</div>
@endsection
