<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Entidad;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EntidadController extends Controller
{
    public function index()
    {
        $entidades = Entidad::all();
        return response()->json($entidades, Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([

            'nombre' => 'required|string|max:191',
            'nit' => 'required|string|max:191',
            'direccion' => 'nullable|string|max:191',
            'telefono' => 'nullable|string|max:191',
            'email' => 'nullable|email|max:191',
            'notas' => 'nullable|string',
        ]);

        $entidad = Entidad::create($validated);
        return response()->json($entidad->fresh(), Response::HTTP_CREATED);
    }

    public function show(Entidad $entidad)
    {
        return response()->json($entidad, Response::HTTP_OK);
    }

    public function update(Request $request, Entidad $entidad)
    {

        if (!$entidad) {
            return response()->json(['error' => 'Entidad no encontrada'], Response::HTTP_NOT_FOUND);
        }

        $validatedData = $request->validate([
            'nombre' => 'sometimes|required|string|max:191',
            'nit' => 'sometimes|required|string|max:191',
            'direccion' => 'nullable|string|max:191',
            'telefono' => 'nullable|string|max:191',
            'email' => 'nullable|email|max:191',
            'notas' => 'nullable|string',
        ]);

        $entidad->update($validatedData);
        return response()->json($entidad, Response::HTTP_OK);
    }

    public function destroy(Entidad $entidad)
    {
        $entidad ->delete();

        if (!$entidad) {
            return response()->json(['error' => 'Entidad no encontrada'], Response::HTTP_NOT_FOUND);
        }
        return response()->json(['message' => 'Entidad eliminada correctamente'], Response::HTTP_OK);
    }
}
