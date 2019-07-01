<?php

namespace Xhunter\Models;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    protected $table = 'personal';

    protected $fillable = [
        'nombre_completo',
        'apellido_paterno',
        'apellido_materno',
        'cargo_id',
    ];

    public function cargo()
    {
        return $this->belongsTo(Cargo::class);
    }

    #region Accesores
    public function getNameCargoAttribute()
    {
        return "{$this->cargo->cargo}";
    }
    #endregion
}
