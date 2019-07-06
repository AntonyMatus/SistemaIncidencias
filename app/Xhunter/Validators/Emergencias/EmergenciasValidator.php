<?php

namespace Xhunter\Validators\Emergencias;

use Xhunter\Abstracts\AValidator;

class EmergenciasValidator extends AValidator
{
    public function __construct()
    {
        $this->messages = [
            'tipo_emergencia.required' => 'El Tipo de Emergencia es requerido!',
            'tipo_emergencia.max' => 'El Tipo de Emergencia es máximo 255 caracteres!',
            'tipo_emergencia.regex' => 'El Tipo de Emergencia no es valido'
        ];
        $this->rules = [
            'create' => [
                'tipo_emergencia' => ['required', 'string', 'max:255','regex:/^[A-Za-zÑñÁáÉéÍíÓóÚúÜü\s]+$/']
            ],
            'update' => [
                'tipo_emergencia' => ['required', 'string', 'max:255','regex:/^[A-Za-zÑñÁáÉéÍíÓóÚúÜü\s]+$/']
            ]
        ];
    }
}