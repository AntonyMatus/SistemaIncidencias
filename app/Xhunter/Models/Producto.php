<?php

namespace Xhunter\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
        'nombre',
        'detalle'
    ];

    #region Mutadores
    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = strtoupper($value);
    }
    #endregion
}
