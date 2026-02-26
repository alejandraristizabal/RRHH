<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\RolesAndPermissionsSeeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Crear usuario de prueba
        $user = User::factory()->create([
            'name' => 'Gestor RRHH',
            'email' => 'gestor@example.com',
            'password' => bcrypt('12345678'),
        ]);

        // Ejecutar seeder de roles y permisos
        $this->call([
            RolesAndPermissionsSeeder::class,
        ]);

        // Asignar rol al usuario
        $user->assignRole('Gestor RRHH');
    }
}