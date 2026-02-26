<?php

namespace App\Models;
use App\Models\Entidad;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    use HasFactory;

    protected $fillable = [
        'identificacion',
        'nombre',
        'email',
        'telefono',
        'direccion',
        'notas',
        'entidad_id',
        'fecha_nacimiento',
        'creado_por',
    ];
    public function entidad()
    {
        return $this->belongsTo(Entidad::class);
    }
}
