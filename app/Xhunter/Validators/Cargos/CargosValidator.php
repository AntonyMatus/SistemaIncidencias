<?php

namespace Xhunter\Validators\Cargos;

use Xhunter\Abstracts\AValidator;

class CargosValidator extends AValidator
{
    public function __construct()
    {
        $this->messages = [
            'cargo.required' => 'El Cargo es requerido!',
            'cargo.max' => 'El campo Cargo es de máximo 255 caracteres!',
        ];
        $this->rules = [
            'create' => [
                'cargo' => 'required|max:255|string'  
            ],
            'update' => [
                'cargo' => 'required|max:255|string'
            ]
        ];
    }
}