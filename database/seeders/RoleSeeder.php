<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $permisos = [
            'ver categorias', 'crear categorias', 'editar categorias', 'eliminar categorias',
            'ver ingredientes', 'crear ingredientes', 'editar ingredientes', 'eliminar ingredientes',
            'ver platos', 'crear platos', 'editar platos', 'eliminar platos',
            'ver recetas', 'crear recetas', 'editar recetas', 'eliminar recetas',
            'ver pedidos', 'crear pedidos', 'editar pedidos', 'eliminar pedidos',
            'gestionar usuarios',
        ];

        foreach ($permisos as $permiso) {
            Permission::firstOrCreate(['name' => $permiso]);
        }

        $roleAdmin = Role::firstOrCreate(['name' => 'Admin']);
        $roleAdmin->givePermissionTo(Permission::all());

        $roleMesero = Role::firstOrCreate(['name' => 'Mesero']);
        $roleMesero->givePermissionTo([
            'ver categorias',
            'ver platos',
            'ver pedidos',
            'crear pedidos',
            'editar pedidos'
        ]);

        $roleCocinero = Role::firstOrCreate(['name' => 'Cocinero']);
        $roleCocinero->givePermissionTo([
            'ver categorias',
            'ver ingredientes',
            'ver platos',
            'ver recetas',
            'ver pedidos',
            'editar pedidos'
        ]);

        $adminUser = User::updateOrCreate([
            'email' => 'admin@restaurante.com'
        ], [
            'name' => 'Administrador',
            'password' => bcrypt('Admin123!'), 
        ]);

        $adminUser->assignRole('Admin');

        $meseroUser = User::updateOrCreate([
            'email' => 'mesero@restaurante.com'
        ], [
            'name' => 'Mesero1',
            'password' => bcrypt('Admin123!'),
        ]);
        $meseroUser->assignRole('Mesero');

        $cocineroUser = User::updateOrCreate([
            'email' => 'cocinero@restaurante.com'
        ], [
            'name' => 'Cocinero1',
            'password' => bcrypt('Admin123!'),
        ]);
        $cocineroUser->assignRole('Cocinero');
    }
}
