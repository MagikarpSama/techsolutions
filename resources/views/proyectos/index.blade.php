@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Proyectos</h1>
    <a href="{{ route('proyectos.create') }}" class="btn btn-primary mb-3">Nuevo Proyecto</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Fecha Inicio</th>
                <th>Estado</th>
                <th>Responsable</th>
                <th>Monto</th>
                <th>Usuario Creador</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($proyectos as $proyecto)
            <tr>
                <td>{{ $proyecto->id }}</td>
                <td>{{ $proyecto->nombre }}</td>
                <td>{{ $proyecto->fecha_inicio }}</td>
                <td>{{ $proyecto->estado }}</td>
                <td>{{ $proyecto->responsable }}</td>
                <td>{{ $proyecto->monto }}</td>
                <td>{{ $proyecto->usuario ? $proyecto->usuario->name : 'Sin usuario' }}</td>
                <td>
                    <a href="{{ route('proyectos.show', $proyecto) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('proyectos.edit', $proyecto) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('proyectos.destroy', $proyecto) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar este proyecto?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
