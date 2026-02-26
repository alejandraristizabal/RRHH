<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Limpiar caché de permisos
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Crear permisos
        $permissions = [
            'gestionar colaboradores',
            'gestionar contratos',
            'gestionar prorrogas',
            'terminar contratos',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Crear rol
        $role = Role::firstOrCreate(['name' => 'Gestor RRHH']);

        // Asignar permisos al rol
        $role->syncPermissions($permissions);
    }
}
