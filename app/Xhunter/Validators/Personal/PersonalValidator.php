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
            'nombre_completo.regex' => 'El nombre no es valido',
            'apellido_paterno.required' => 'El Apellido Paterno es requerido!',
            'apellido_paterno.max' => 'El Apellido Paterno es maximo 255 caracteres!',
            'apellido_paterno.regex' => 'El apellido paterno no es valido',
            'apellido_materno.nullable' => 'El Apellido Materno puede estar vacio!',
            'apellido_materno.max' => 'El Apellido Materno es maximo 255 caracteres!',
            'apellido_materno.regex' => 'El apellido materno no es valido',
            'cargo_id.required' => 'El cargo es requerido',
            'cargo_id.exists' => 'El cargo seleccionado no existe'
        ];

        $this->rules = [
            'create' => [
                'nombre_completo' => ['required', 'string', 'max:255','regex:/^[A-Za-zÑñÁáÉéÍíÓóÚúÜü\s]+$/'],
                'apellido_paterno' => ['required', 'string', 'max:255','regex:/^[A-Za-zÑñÁáÉéÍíÓóÚúÜü\s]+$/'],
                'apellido_materno' => ['nullable', 'string', 'max:255','regex:/^[A-Za-zÑñÁáÉéÍíÓóÚúÜü\s]+$/'],
                'cargo_id' => 'required|exists:cargos,id'
            ],
            'update' => [
                'nombre_completo' => ['required', 'string', 'max:255','regex:/^[A-Za-zÑñÁáÉéÍíÓóÚúÜü\s]+$/'],
                'apellido_paterno' => ['required', 'string', 'max:255','regex:/^[A-Za-zÑñÁáÉéÍíÓóÚúÜü\s]+$/'],
                'apellido_materno' => ['nullable', 'string', 'max:255','regex:/^[A-Za-zÑñÁáÉéÍíÓóÚúÜü\s]+$/'],
                'cargo_id' => 'required|exists:cargos,id'
            ]
        ];
    }
}