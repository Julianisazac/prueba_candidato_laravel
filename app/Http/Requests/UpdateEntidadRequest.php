<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEntidadRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre' => 'sometimes|required|string|max:191',
            'nit' => 'sometimes|required|string|max:191',
            'direccion' => 'nullable|string|max:191',
            'telefono' => 'nullable|string|max:191',
            'email' => 'nullable|email|max:191',
            'notas' => 'nullable|string',
        ];
    }
}