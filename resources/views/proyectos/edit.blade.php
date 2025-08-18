@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Editar Proyecto</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('proyectos.update', $proyecto) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ $proyecto->nombre }}" required>
        </div>
        <div class="mb-3">
            <label for="fecha_inicio" class="form-label">Fecha de Inicio</label>
            <input type="date" name="fecha_inicio" class="form-control" value="{{ $proyecto->fecha_inicio }}" required>
        </div>
        <div class="mb-3">
                <label for="estado" class="form-label">Estado</label>
                <select name="estado" class="form-select" required>
                    <option value="">Selecciona un estado</option>
                    <option value="Pendiente" {{ old('estado', $proyecto->estado) == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                    <option value="En Progreso" {{ old('estado', $proyecto->estado) == 'En Progreso' ? 'selected' : '' }}>En Progreso</option>
                    <option value="Finalizado" {{ old('estado', $proyecto->estado) == 'Finalizado' ? 'selected' : '' }}>Finalizado</option>
                    <option value="Cancelado" {{ old('estado', $proyecto->estado) == 'Cancelado' ? 'selected' : '' }}>Cancelado</option>
                </select>
        </div>
        <div class="mb-3">
            <label for="responsable" class="form-label">Responsable</label>
            <input type="text" name="responsable" class="form-control" value="{{ $proyecto->responsable }}" required>
        </div>
        <div class="mb-3">
            <label for="monto" class="form-label">Monto</label>
            <input type="number" step="0.01" name="monto" class="form-control" value="{{ $proyecto->monto }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('proyectos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
