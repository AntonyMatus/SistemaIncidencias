<?php

namespace Xhunter\Validators\Productos;

use Xhunter\Abstracts\AValidator;

class ProductosValidator extends AValidator
{
    public function __construct()
    {
        $this->messages = [
            'nombre.required' => 'El nombre del producto es requerido!',
            'nombre.max' => 'El nombre del producto es máximo 50 caracteres!',
            'detalle.required' => 'El detalle del producto es requerido!',
        ];

        $this->rules = [
            'create' => [
                'nombre' => 'required|max:50|string',
                'detalle' => 'required'
            ],
            'update' => [
                'nombre' => 'required|max:50|string',
                'detalle' => 'required|string'
            ]
        ];
    }
}