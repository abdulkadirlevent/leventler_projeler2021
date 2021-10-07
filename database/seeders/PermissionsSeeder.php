<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create default permissions
        Permission::create(['name' => 'list tesisatisadimlaris']);
        Permission::create(['name' => 'view tesisatisadimlaris']);
        Permission::create(['name' => 'create tesisatisadimlaris']);
        Permission::create(['name' => 'update tesisatisadimlaris']);
        Permission::create(['name' => 'delete tesisatisadimlaris']);

        Permission::create(['name' => 'list tesisatlars']);
        Permission::create(['name' => 'view tesisatlars']);
        Permission::create(['name' => 'create tesisatlars']);
        Permission::create(['name' => 'update tesisatlars']);
        Permission::create(['name' => 'delete tesisatlars']);

        Permission::create(['name' => 'list projelers']);
        Permission::create(['name' => 'view projelers']);
        Permission::create(['name' => 'create projelers']);
        Permission::create(['name' => 'update projelers']);
        Permission::create(['name' => 'delete projelers']);

        Permission::create(['name' => 'list caris']);
        Permission::create(['name' => 'view caris']);
        Permission::create(['name' => 'create caris']);
        Permission::create(['name' => 'update caris']);
        Permission::create(['name' => 'delete caris']);

        // Create user role and assign existing permissions
        $currentPermissions = Permission::all();
        $userRole = Role::create(['name' => 'user']);
        $userRole->givePermissionTo($currentPermissions);

        // Create admin exclusive permissions
        Permission::create(['name' => 'list roles']);
        Permission::create(['name' => 'view roles']);
        Permission::create(['name' => 'create roles']);
        Permission::create(['name' => 'update roles']);
        Permission::create(['name' => 'delete roles']);

        Permission::create(['name' => 'list permissions']);
        Permission::create(['name' => 'view permissions']);
        Permission::create(['name' => 'create permissions']);
        Permission::create(['name' => 'update permissions']);
        Permission::create(['name' => 'delete permissions']);

        Permission::create(['name' => 'list users']);
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'update users']);
        Permission::create(['name' => 'delete users']);

        // Create admin role and assign all permissions
        $allPermissions = Permission::all();
        $adminRole = Role::create(['name' => 'super-admin']);
        $adminRole->givePermissionTo($allPermissions);

        $user = \App\Models\User::whereEmail('admin@admin.com')->first();

        if ($user) {
            $user->assignRole($adminRole);
        }
    }
}
