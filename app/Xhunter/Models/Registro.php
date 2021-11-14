<?php

namespace Xhunter\Models;

use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    protected $table = 'registro_emergencia';

    protected $fillable = [
        'personal_id',
        'emergencias_id',
        'sub_estaciones',
        'emergencia',
        'descripción_emergencia',
        'calle',
        'num',
        'colonia',
        'entre_calle',
        'num_escoltas',
        'personas_atendidas',
        'hora_salida',
        'hora_retorno',
        'fecha_reporte',
        'tipo_servicio'
    
    ];

    public function personal()
    {
        return $this->belongsTo(Personal::class);
    }

    public function vehiculos()
    {
        return $this->belongsToMany(Vehiculo::class,'reportes_unidades')->withTimestamps();
    }

    public function emergencias()
    {
        return $this->belongsTo(Emergencia::class);
    }

    #region Accesores
    public function getNamePersonalAttribute()
    {
        return "{$this->personal->nombre_completo}";
    }

    public function getNameVehiculoAttribute()
    {
        return "{$this->vehiculos->vehiculo_unidad}";
    }

    public function getNameEmergenciaAttribute()
    {
        return "{$this->emergencias->tipo_emergencia}";
    }
    #endregion
}
