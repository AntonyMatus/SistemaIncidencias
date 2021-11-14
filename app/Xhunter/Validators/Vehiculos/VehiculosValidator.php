<?php

namespace Xhunter\Validators\Vehiculos;

use Xhunter\Abstracts\AValidator;

class VehiculosValidator extends AValidator
{
    public function __construct()
    {
        $this->messages = [
            'vehiculo_unidad.required' => 'La Unidad del vehiculo es requerido!',
            'vehiculo_unidad.max' => 'La Unidad del vehiculo es máximo 6 caracteres!',
            'imagen.image' => 'El archivo debe ser una imagen',
            'imagen.max' => 'El tamaño de la imagen no debe pasar de los 2Mb',
            'imagen.nullable' => 'El campo file puede ser null',
            'imagen.mimes' => 'La imagen solo soporta imagenes jpeg, png,jpg,gif. No se permite otro formato',
            'num_serie.required' => 'El Numero de serie es requerido!',
            'num_serie.max' => 'El Numero de Serie del Vehiculo es maximo 18 caracteres!',
            'inventario.required' => 'El Inventario del vehiculo es requerido!',
            'inventario.max' => 'El inventario del vehiculo es maximo 18 caracteres!',
            'no_motor.required' => 'El Numero del Motor es requerido!',
            'no_motor.max' => 'El Numero del Motor del Vehiculo es maximo 18 caracteres!',
            'marca.required' => 'La  Marca del vehiculo es requerido!',
            'marca.max' => 'La Marca del vehiculo es maximo 18 caracteres!',
            'modelo.required' => 'El Modelo del vehiculo es requerido!',
            'modelo.max' => 'El Modelo del vehiculo es maximo 12 caracteres!',
            'placas.required' => 'Las Placas del vehiculo es requerido!',
            'placas.max' => 'Las Placas del vehiculo es maximo 12 caracteres!',
            
            
        ];
        $this->rules = [
            'create' => [
                'vehiculo_unidad' => 'required|max:6',
                'num_serie' => 'required|max:18',
                'inventario' => 'required|max:18',
                'no_motor' => 'required|max:18',
                'marca' => 'required|max:18',
                'modelo'=> 'required|max:12',
                'placas' => 'required|max:12',
                
                
            ],
            'update' => [
                'vehiculo_unidad' => 'required|max:6',
                'num_serie' => 'required|max:18',
                'inventario' => 'required|max:18',
                'no_motor' => 'required|max:18',
                'marca' => 'required|max:18',
                'modelo'=> 'required|max:12',
                'placas' => 'required|max:12',
            ]
        ];
    }
}