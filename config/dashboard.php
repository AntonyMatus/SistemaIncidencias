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
            'icon' => 'fa fa-users fa-lg mt-4',
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
            'titulo' => 'Productos',
            'grupo_ruta' => 'productos',
            'icon' => 'fa fa-shopping-cart',
            'is_link' => false,
            'item_in_submenu' => true,
            'descripcion' => 'Módulo de Administración de Productos',
            'submenu' => [
                [
                    'ruta' => 'productos.index',
                    'label' => 'Lista de Roles',
                    'icon' => 'fa fa-list'
                ],
                [
                    'ruta' => 'productos.agregar',
                    'label' => 'Agregar Rol',
                    'icon' => 'fa fa-plus'
                ]
            ]
        ],
    ]
];