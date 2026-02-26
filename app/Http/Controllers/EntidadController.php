<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Entidad;
use App\Http\Requests\StoreEntidadRequest;
use App\Http\Requests\UpdateEntidadRequest;
use Symfony\Component\HttpFoundation\Response;



class EntidadController extends Controller
{
    public function index()
    {
        $entidades = Entidad::all();
        return response()->json($entidades, Response::HTTP_OK);
    }

   public function store(StoreEntidadRequest $request)
{
    $entidad = Entidad::create($request->validated());

    return response()->json($entidad, Response::HTTP_CREATED);
}

    public function show(Entidad $entidad)
    {
        return response()->json($entidad, Response::HTTP_OK);
    }

   public function update(UpdateEntidadRequest $request, Entidad $entidad)
{
    $entidad->update($request->validated());

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
