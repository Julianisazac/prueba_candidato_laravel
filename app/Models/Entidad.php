<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entidad extends Model
{
    use HasFactory;
    protected $table = 'entidades';

    protected $fillable = [
        'nombre',
        'nit',
        'direccion',
        'telefono',
        'email',
        'notas',
    ];
    public function contactos()
    {
        return $this->hasMany(Contacto::class);
    }

    public function getRouteKeyName()
    {
        return 'id';
    }
}
