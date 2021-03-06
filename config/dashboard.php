<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Módulos del Sistema
    |--------------------------------------------------------------------------
    */

    'modulos' => [
        #nextElement
        [
            'titulo' => 'Usuarios',
            'grupo_ruta' => 'usuarios',
            'icon' => 'fa fa-users',
            'is_link' => false,
            'item_in_submenu' => true,
            'descripcion' => 'Módulo de Administración de Usuarios',
            'submenu' => [
                [
                    'ruta' => 'usuarios.index',
                    'label' => 'Lista de usuarios',
                    'icon' => 'fa fa-list'
                ],
                [
                    'ruta' => 'usuarios.agregar',
                    'label' => 'Agregar usuario',
                    'icon' => 'fa fa-plus'
                ]
            ]
        ],
        [
            'titulo' => 'Roles',
            'grupo_ruta' => 'roles',
            'icon' => 'fa fa-address-card-o',
            'is_link' => false,
            'item_in_submenu' => true,
            'descripcion' => 'Módulo de Administración de Roles y Permisos',
            'submenu' => [
                [
                    'ruta' => 'roles.index',
                    'label' => 'Lista de Roles',
                    'icon' => 'fa fa-list'
                ],
                [
                    'ruta' => 'roles.agregar',
                    'label' => 'Agregar Rol',
                    'icon' => 'fa fa-plus'
                ]
            ]
        ],
        [
            'titulo' => 'Vehiculos',
            'grupo_ruta' => 'vehiculos',
            'icon' => 'fa fa-car',
            'is_link' => false,
            'item_in_submenu' => true,
            'descripcion' => 'Módulo de Administración de Vehiculos',
            'submenu' => [
                [
                    'ruta' => 'vehiculos.index',
                    'label' => 'Lista de Vehiculos',
                    'icon' => 'fa fa-list'
                ],
                [
                    'ruta' => 'vehiculos.agregar',
                    'label' => 'Agregar Vehiculo',
                    'icon' => 'fa fa-plus'
                ]
            ]
        ],
        [
            'titulo' => 'Cargos',
            'grupo_ruta' => 'cargos',
            'icon' => 'fa fa-fire-extinguisher',
            'is_link' => false,
            'item_in_submenu' => true,
            'descripcion' => 'Módulo de Administración de Cargos',
            'submenu' => [
                [
                    'ruta' => 'cargos.index',
                    'label' => 'Lista de Cargos',
                    'icon' => 'fa fa-list'
                ],
                [
                    'ruta' => 'cargos.agregar',
                    'label' => 'Agregar Cargo',
                    'icon' => 'fa fa-plus'
                ]
            ]
        ],
        [
            'titulo' => 'Personal',
            'grupo_ruta' => 'personal',
            'icon' => 'fa fa-user-circle-o',
            'is_link' => false,
            'item_in_submenu' => true,
            'descripcion' => 'Módulo de Administración del Personal',
            'submenu' => [
                [
                    'ruta' => 'personal.index',
                    'label' => 'Lista de Personal',
                    'icon' => 'fa fa-list'
                ],
                [
                    'ruta' => 'personal.agregar',
                    'label' => 'Agregar Personal',
                    'icon' => 'fa fa-plus'
                ]
            ]
        ],
        [
            'titulo' => 'Emergencias',
            'grupo_ruta' => 'emergencias',
            'icon' => 'fa fa-building-o',
            'is_link' => false,
            'item_in_submenu' => true,
            'descripcion' => 'Módulo de Administración de Tipos de Emergencia',
            'submenu' => [
                [
                    'ruta' => 'emergencias.index',
                    'label' => 'Lista de Emergencias',
                    'icon' => 'fa fa-list'
                ],
                [
                    'ruta' => 'emergencias.agregar',
                    'label' => 'Agregar Emergencia',
                    'icon' => 'fa fa-plus'
                ]
            ]
        ],
        [
            'titulo' => 'Registros',
            'grupo_ruta' => 'registros',
            'icon' => 'fa fa-book',
            'is_link' => false,
            'item_in_submenu' => true,
            'descripcion' => 'Módulo de Administración del Registros de Emergencia',
            'submenu' => [
                [
                    'ruta' => 'registros.index',
                    'label' => 'Lista de Registros',
                    'icon' => 'fa fa-list'
                ],
                [
                    'ruta' => 'registros.agregar',
                    'label' => 'Agregar Registro',
                    'icon' => 'fa fa-plus'
                ]
            ]
        ],
        [
            'titulo' => 'Reportes',
            'grupo_ruta' => 'reporte',
            'icon' => 'fa fa-print',
            'is_link' => false,
            'item_in_submenu' => true,
            'descripcion' => 'Módulo de Administración de Reportes',
            'submenu' => [
                [
                    'ruta' => 'reporte.index',
                    'label' => 'Generar Reporte',
                    'icon' => 'fa fa-list'
                ],
               
            ]
        ],
    ]
];