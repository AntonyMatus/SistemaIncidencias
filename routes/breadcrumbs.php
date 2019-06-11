<?php

// Dashboard
Breadcrumbs::for('dashboard', function ($trail) {
    $trail->push('Dashboard', route('dashboard'));
});

// Usuarios
Breadcrumbs::for('usuarios', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Usuarios', route('usuarios.index'));
});

// Usuarios/Agregar
Breadcrumbs::for('usuarios.agregar', function ($trail) {
    $trail->parent('usuarios');
    $trail->push('Agregar', route('usuarios.agregar'));
});

// Usuarios/Editar
Breadcrumbs::for('usuarios.editar', function ($trail) {
    $trail->parent('usuarios');
    $trail->push('Editar');
});

// Usuarios/Ver
Breadcrumbs::for('usuarios.ver', function ($trail, $userName) {
    $trail->parent('usuarios');
    $trail->push($userName);
});

// Roles
Breadcrumbs::for('roles', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Roles', route('roles.index'));
});

// Roles/Agregar
Breadcrumbs::for('roles.agregar', function ($trail) {
    $trail->parent('roles');
    $trail->push('Agregar', route('roles.agregar'));
});

// Roles/Editar
Breadcrumbs::for('roles.editar', function ($trail) {
    $trail->parent('roles');
    $trail->push('Editar');
});

// Roles/Ver
Breadcrumbs::for('roles.ver', function ($trail, $rolName) {
    $trail->parent('roles');
    $trail->push($rolName);
});

// Productos
Breadcrumbs::for('productos', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Productos', route('productos.index'));
});

//Vehiculos
Breadcrumbs::for('vehiculos', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Vehiculos', route('vehiculos.index'));
});

//Vehiculo/Agregar
Breadcrumbs::for('vehiculos.agregar', function ($trail) {
    $trail->parent('vehiculos');
    $trail->push('Agregar', route('vehiculos.agregar'));
});

//Vehiculo/Editar
Breadcrumbs::for('vehiculos.editar', function ($trail) {
    $trail->parent('vehiculos');
    $trail->push('Editar');
});

//vehiculo/Ver
Breadcrumbs::for('vehiculos.ver', function ($trail, $vehiculo_unidad) {
    $trail->parent('vehiculos');
    $trail->push($vehiculo_unidad);
});