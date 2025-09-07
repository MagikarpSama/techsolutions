<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Proyecto;
use Illuminate\Http\Request;

class ProyectoApiController extends Controller
{
    public function index()
    {
        $proyectos = Proyecto::all();
        return response()->json($proyectos, 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255|unique:proyectos,nombre',
            'descripcion' => 'nullable|string',
            'fecha_inicio' => 'required|date',
            'estado' => 'required|string',
            'responsable' => 'required|string',
            'monto' => 'required|numeric',
        ], [
            'nombre.unique' => 'No se pueden crear proyectos con el mismo nombre',
        ]);
    $validated['created_by'] = auth()->id();
    $proyecto = Proyecto::create($validated);
    return response()->json($proyecto, 201);
    }

    public function show($id)
    {
        $proyecto = Proyecto::find($id);
        if (!$proyecto) {
            return response()->json(['error' => 'Proyecto no encontrado'], 404);
        }
        return response()->json($proyecto, 200);
    }

    public function update(Request $request, $id)
    {
        $proyecto = Proyecto::find($id);
        if (!$proyecto) {
            return response()->json(['error' => 'Proyecto no encontrado'], 404);
        }
        $validated = $request->validate([
            'nombre' => 'sometimes|required|string|max:255|unique:proyectos,nombre,' . $id,
            'descripcion' => 'nullable|string',
            'fecha_inicio' => 'sometimes|required|date',
            'estado' => 'sometimes|required|string',
            'responsable' => 'sometimes|required|string',
            'monto' => 'sometimes|required|numeric',
        ], [
            'nombre.unique' => 'No se pueden crear proyectos con el mismo nombre',
        ]);
        $proyecto->update($validated);
        return response()->json($proyecto, 200);
    }

    public function destroy($id)
    {
        $proyecto = Proyecto::find($id);
        if (!$proyecto) {
            return response()->json(['error' => 'Proyecto no encontrado'], 404);
        }
    $proyecto->delete();
    return response()->json(['message' => 'Proyecto eliminado correctamente'], 200);
    }
}
