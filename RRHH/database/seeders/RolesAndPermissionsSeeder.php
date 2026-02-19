<?php

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

// Crear permisos
$permisos = [
    'crear colaboradores', 'editar colaboradores', 'ver colaboradores', 'eliminar colaboradores',
    'crear contratos', 'editar contratos', 'ver contratos', 'eliminar contratos',
    'crear prórrogas', 'editar prórrogas', 'ver prórrogas', 'eliminar prórrogas',
    'registrar terminación', 'ver terminaciones', 'anular terminación'
];

foreach ($permisos as $permiso) {
    Permission::create(['name' => $permiso]);
}

// Crear rol único
$gestorRRHH = Role::create(['name' => 'Gestor RRHH']);

// Asignar todos los permisos al rol
$gestorRRHH->givePermissionTo(Permission::all());

// Asignar rol a un usuario
$user = User::find(1);
$user->assignRole('Gestor RRHH');

