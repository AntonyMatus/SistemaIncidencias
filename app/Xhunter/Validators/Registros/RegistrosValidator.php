<?php

namespace Xhunter\Validators\Registros;

use Xhunter\Abstracts\AValidator;

class RegistrosValidator extends AValidator
{

    public function __construct()
    {
        $this->messages = [
            'personal_id.required' => 'El Personal es requerido',
            'personal_id.exists' => 'El personal seleccionado no existe',
            'vehiculos_id.required' => 'El vehiculo es requerido',
            'vehiculos_id.exists' => 'El vehiculo seleccionado no existe',
            'emergencias_id.required' => 'La Emergencia es requerido',
            'emergencias_id.exists' => 'La emergencia seleccionada no existe',
            'emergencia.required' => 'La Emergencia es requerida',
            'emergencia.max' => 'La emergencia es máximo 255 caracteres!',
            'emergencia.regex' => 'La emergencia no es valida',
            'descripción_emergencia.required' => 'La descripción de la emergencia es requerida',
            'descripción_emergencia.max' => 'La descripción de la emergencia es máximo 255 caracteres!',
            'descripción_emergencia.regex' => 'La descripcion de la emergencia no es valida',
            'num_escoltas.required' => 'El numero de escoltas es requerido',
            'num_escoltas.max' => 'El numero de escoltas es máximo 3 caracteres',
            'personas_atendidas.required' => 'Las personas atendidas es requerida',
            'personas_atendidas.max' => 'Las personas atendidas es máximo 3 caracteres',
            'hora_salida.required' => 'La hora de salida es requerida',
            'hora_retorno.required' => 'La hora de retorno es requerida',
            'fecha_reporte.required' => 'La fecha de reportes es requerida' 

        ];

        $this->rules = [
            'create' => [
                'personal_id' => 'required|exists:personal,id',
                'emergencias_id' => 'required|exists:emergencias,id',
                'emergencia' => ['required', 'string', 'max:255','regex:/^[A-Za-zÑñÁáÉéÍíÓóÚúÜü\s]+$/'],
                'descripción_emergencia' => ['required', 'string', 'max:255','regex:/^[A-Za-z0-9ÑñÁáÉéÍíÓóÚúÜü\s]+$/'],
                
                'num_escoltas' => ['required', 'numeric'],
                'personas_atendidas' => ['required', 'numeric'],
                'hora_salida' => ['required'],
                'hora_retorno' => ['required'],
                'fecha_reporte' => ['required']
            ],
            'update' => [
                'personal_id' => 'required|exists:personal,id',
                'emergencias_id' => 'required|exists:emergencias,id',
                'emergencia' => ['required', 'string', 'max:255','regex:/^[A-Za-zÑñÁáÉéÍíÓóÚúÜü\s]+$/'],
                'descripción_emergencia' => ['required', 'string', 'max:255','regex:/^[A-Za-zÑñÁáÉéÍíÓóÚúÜü\s]+$/'],
                'num_escoltas' => ['required', 'numeric'],
                'personas_atendidas' => ['required', 'numeric'],
                'hora_salida' => ['required'],
                'hora_retorno' => ['required'],
                'fecha_reporte' => ['required']
            ]
        ];
    }

}