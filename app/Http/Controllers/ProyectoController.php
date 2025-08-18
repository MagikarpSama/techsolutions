<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;

class ProyectoController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!auth()->check()) {
                return response()->view('errors.not_authenticated');
            }
            return $next($request);
        });
    }
    public function index()
    {
        $proyectos = Proyecto::all();
        return view('proyectos.index', compact('proyectos'));
    }

    
    public function create()
    {
        return view('proyectos.create');
    }

    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255|unique:proyectos,nombre',
            'fecha_inicio' => 'required|date',
            'estado' => 'required|string|max:255',
            'responsable' => 'required|string|max:255',
            'monto' => 'required|numeric',
        ], [
            'nombre.unique' => 'No se pueden crear proyectos con el mismo nombre',
        ]);
        Proyecto::create($validated);
        return redirect()->route('proyectos.index')->with('success', 'Proyecto creado correctamente');
    }

    
    public function show(string $id)
    {
        $proyecto = Proyecto::findOrFail($id);
        return view('proyectos.show', compact('proyecto'));
    }

   
    public function edit(string $id)
    {
        $proyecto = Proyecto::findOrFail($id);
        return view('proyectos.edit', compact('proyecto'));
    }

    
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255|unique:proyectos,nombre,' . $id,
            'fecha_inicio' => 'required|date',
            'estado' => 'required|string|max:255',
            'responsable' => 'required|string|max:255',
            'monto' => 'required|numeric',
        ], [
            'nombre.unique' => 'Ya existe un proyecto con ese nombre',
        ]);
        $proyecto = Proyecto::findOrFail($id);
        $proyecto->update($validated);
        return redirect()->route('proyectos.index')->with('success', 'Proyecto actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $proyecto = Proyecto::findOrFail($id);
        $proyecto->delete();
        return redirect()->route('proyectos.index')->with('success', 'Proyecto eliminado correctamente');
    }
}
