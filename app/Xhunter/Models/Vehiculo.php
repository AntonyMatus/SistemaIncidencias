<?php

namespace Xhunter\Models;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    protected $fillable = [
        'imagen',
        'vehiculo_unidad',
        'num_serie',
        'inventario',
        'no_motor',
        'marca',
        'modelo',
        'placas',
        'estatus_vehiculo'
    ];

    public function registro()
    {
        return $this->belongsToMany(Registro::class,'reportes_unidades');
    }
}
