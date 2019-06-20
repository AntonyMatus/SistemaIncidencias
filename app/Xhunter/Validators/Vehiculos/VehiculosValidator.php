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
            'imagen.nullable' => 'El campo puede esta Vacio',
            'imagen.mimes' => 'La imagen tiene que ser jpeg, png,jpg,gif. No se permite otro formato',
            'num_serie.required' => 'El Numero de serie es requerido!',
            'num_serie.max' => 'El Numero de Serie del Vehiculo es maximo 8 caracteres!',
            'num_serie.string' => 'El Numero de Serie debe ser una cadena de caracteres!',
            'inventario.required' => 'El Inventario del vehiculo es requerido!',
            'inventario.max' => 'El inventario del vehiculo es maximo 8 caracteres!',
            'inventario.string' => 'El inventario del vehiculo debe ser una cadena de caracteres!',
            'no_motor.required' => 'El Numero del Motor es requerido!',
            'no_motor.max' => 'El Numero del Motor del Vehiculo es maximo 8 caracteres!',
            'no_motor.string' => 'El Numero del Motor debe ser una cadena de caracteres!',
            'marca.required' => 'La  Marca del vehiculo es requerido!',
            'marca.max' => 'La Marca del vehiculo es maximo 8 caracteres!',
            'marca.string' => 'La Marca del vehiculo debe ser una cadena de caracteres!',
            'modelo.required' => 'El Modelo del vehiculo es requerido!',
            'modelo.max' => 'El Modelo del vehiculo es maximo 8 caracteres!',
            'modelo.string' => 'El Modelo del vehiculo debe ser una cadena de caracteres!',
            'placas.required' => 'Las Placas del vehiculo es requerido!',
            'placas.max' => 'Las Placas del vehiculo es maximo 6 caracteres!',
            'placas.string' => 'Las Placas del vehiculo debe ser una cadena de caracteres!',

            
        ];

        $this->rules = [
            'create' => [
               // 'imagen'=>'image|max:2000|nullable|mimes:,jpeg,png,jpg,gif',
                'vehiculo_unidad' => 'required|max:6|string',
                'num_serie' => 'required|max:8|string',
                'inventario' => 'required|max:8|string',
                'no_motor' => 'required|max:8|string',
                'marca' => 'required|max:8|string',
                'modelo'=> 'required|max:8|string',
                'placas' => 'required|max:6|string',
                //'estatus_vehiculo' => 'required',
                
            ],
            'update' => [
               // 'imagen'=>'image|max:2000|nullable|mimes:jpeg,png,jpg,gif',
                'vehiculo_unidad' => 'required|max:6|string',
                'num_serie' => 'required|max:8|string',
                'inventario' => 'required|max:8|string',
                'no_motor' => 'required|max:8|string',
                'marca' => 'required|max:8|string',
                'modelo'=> 'required|max:8|string',
                'placas' => 'required|max:6|string',
               // 'estatus_vehiculo' => 'required',
            ]
        ];
    }
}