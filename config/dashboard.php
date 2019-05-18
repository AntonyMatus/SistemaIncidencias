<?php

return [

    /*
    |--------------------------------------------------------------------------
    | El titulo de mi web
    |--------------------------------------------------------------------------
    */

    'modulos' => [
        [
            'titulo' => 'Usuarios',
            'grupo_ruta' => 'usuarios',
            'icon' => 'fa fa-users fa-lg mt-4',
            'is_link' => false,
            'item_in_submenu' => true,
            'descripcion' => 'Módulo de Administración de Usuarios',
            'submenu' => [
                [
                    'ruta' => 'usuarios.index',
                    'label' => 'Lista de usuarios',
                    'icon' => 'fa fa-anchor'
                ],
                [
                    'ruta' => 'usuarios.agregar',
                    'label' => 'Agregar usuario',
                    'icon' => 'fa fa-anchor'
                ]
            ]
        ],
        [
            'titulo' => 'Roles',
            'grupo_ruta' => 'roles',
            'icon' => 'fa fa-user-plus',
            'is_link' => false,
            'item_in_submenu' => true,
            'descripcion' => 'Módulo de Administración de Roles',
            'submenu' => [
                [
                    'ruta' => 'roles.index',
                    'label' => 'Lista de usuarios',
                    'icon' => 'fa fa-anchor'
                ],
                [
                    'ruta' => 'roles.agregar',
                    'label' => 'Agregar usuario',
                    'icon' => 'fa fa-anchor'
                ]
            ]
        ],
    ]

];