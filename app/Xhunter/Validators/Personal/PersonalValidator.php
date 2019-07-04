<?php

namespace Xhunter\Validators\Personal;

use Xhunter\Abstracts\AValidator;

class PersonalValidator extends AValidator 
{

    public function __construct()
    {
        $this->messages = [
            'nombre_completo.required' => 'El Nombre Completo es requerido!',
            'nombre_completo.max' => 'El nombre Completo es máximo 255 caracteres!',
            'apellido_paterno.required' => 'El Apellido Paterno es requerido!',
            'apellido_paterno.max' => 'El Apellido Paterno es maximo 255 caracteres!',
            'apellido_materno.nullable' => 'El Apellido Materno puede estar vacio!',
            'apellido_materno.max' => 'El Apellido Materno es maximo 255 caracteres!'
        ];

        $this->rules = [
            'create' => [
                'nombre_completo' => 'required|max:255|string',
                'apellido_paterno' => 'required|mas:255|string',
                'apellido_materno' => 'nullable|max:255|string',
            ],
            'update' => [
                'nombre_completo' => 'required|max:255|string',
                'apellido_paterno' => 'required|mas:255|string',
                'apellido_materno' => 'nullable|max:255|string',
            ]
        ];
    }
}