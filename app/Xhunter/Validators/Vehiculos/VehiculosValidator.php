<?php

namespace Xhunter\Validators\Vehiculos;

use Xhunter\Abstracts\AValidator;

class VehiculosValidator extends AValidator
{
    public function __construct()
    {
        $this->messages = [
            'vehiculo_unidad.required' => 'El nombre del vehiculo es requerido!',
            'vehiculo_unidad.max' => 'El nombre del vehiculo es máximo 50 caracteres!',
            
        ];

        $this->rules = [
            'create' => [
                'vehiculo_unidad' => 'required|max:50|string',
                
            ],
            'update' => [
                'vehiculo_unidad' => 'required|max:50|string',
                
            ]
        ];
    }
}