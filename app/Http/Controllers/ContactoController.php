<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contactos = Contacto::with('entidad')->get();
        return response()->json($contactos, Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'identificacion' => 'required|string|max:191|unique:contactos,identificacion',
            'nombre' => 'required|string|max:191',
            'email' => 'required|email|max:191',
            'telefono' => 'nullable|string|max:191',
            'direccion' => 'nullable|string|max:191',
            'notas' => 'nullable|string',
            'fecha_nacimiento' => 'nullable|date',
            'entidad_id' => 'required|exists:entidades,id',
        ]);

        $exists = Contacto::where('nombre', $validated['nombre'])
            ->where('email', $validated['email'])
            ->exists();

        if ($exists) {
            return response()->json([
                'error' => 'Ya existe un contcto con ese nombre y/o email'
            ], 422);
        }
        $contacto = Contacto::create($validated);
        return response()->json($contacto, 201);
    }

    public function show(Contacto $contacto)
    {
        return response()->json(
            $contacto->load('entidad'),
            Response::HTTP_OK
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contacto $contacto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contacto $contacto)
    {
        $validated = $request->validate([
            'identificacion' => 'sometimes|required|string|max:191|unique:contactos,identificacion,' . $contacto->id,
            'nombre' => 'sometimes|required|string|max:191',
            'email' => 'sometimes|required|email|max:191',
            'telefono' => 'nullable|string|max:191',
            'direccion' => 'nullable|string|max:191',
            'notas' => 'nullable|string',
            'fecha_nacimiento' => 'nullable|date',
            'entidad_id' => 'sometimes|required|exists:entidades,id',
        ]);
        $contacto->update($validated);
        return response()->json($contacto, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contacto $contacto)
    {
        $contacto->delete();

        return response()->json([
            'message' => 'Contacto eliminado corrctamente'
        ], Response::HTTP_OK);
    }
}
