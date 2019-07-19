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
//Cargos
Breadcrumbs::for('cargos', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Cargos', route('cargos.index'));
});

//Cargos/Agregar
Breadcrumbs::for('cargos.agregar', function ($trail) {
    $trail->parent('cargos');
    $trail->push('Agregar', route('cargos.agregar'));
});

//Cargos/Editar
Breadcrumbs::for('cargos.editar', function ($trail) {
    $trail->parent('cargos');
    $trail->push('Editar');
});

//Personal
Breadcrumbs::for('personal', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Personal', route('personal.index'));
});

//Personal/Agregar
Breadcrumbs::for('personal.agregar', function ($trail) {
    $trail->parent('personal');
    $trail->push('Agregar', route('personal.agregar'));
});

//Personal/Editar
Breadcrumbs::for('personal.editar', function ($trail) {
    $trail->parent('personal');
    $trail->push('Editar');
});

//Emergencias
Breadcrumbs::for('emergencias', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Emergencias', route('emergencias.index'));
});

//Emergencias/Agregar
Breadcrumbs::for('emergencias.agregar', function ($trail) {
    $trail->parent('emergencias');
    $trail->push('Agregar', route('emergencias.agregar'));
});

//Emergencias/Editar
Breadcrumbs::for('emergencias.editar', function ($trail) {
    $trail->parent('emergencias');
    $trail->push('Editar');
});

//Registros
Breadcrumbs::for('registros', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('registros', route('registros.index'));
});

//Registros/Agregar
Breadcrumbs::for('registros.agregar', function ($trail) {
    $trail->parent('registros');
    $trail->push('Agregar', route('registros.agregar'));
});

//Registros/Editar
Breadcrumbs::for('registros.editar', function ($trail) {
    $trail->parent('registros');
    $trail->push('Editar');
});

//Registros/Ver
Breadcrumbs::for('registros.ver', function ($trail, $fecha_reporte) {
    $trail->parent('registros');
    $trail->push($fecha_reporte);
});
