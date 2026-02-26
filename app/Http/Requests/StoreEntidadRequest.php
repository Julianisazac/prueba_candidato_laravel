<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEntidadRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre' => 'required|string|max:191',
            'nit' => 'required|string|max:191',
            'direccion' => 'nullable|string|max:191',
            'telefono' => 'nullable|string|max:191',
            'email' => 'nullable|email|max:191',
            'notas' => 'nullable|string',
        ];
    }
}