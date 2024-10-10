<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->truncatePermissionTables();

        // Define roles and their respective permissions
        $rolesWithPermissions = [
            'admin' => ['manage users', 'manage boardgames', 'add stats'],
            'player' => ['add stats'],
        ];

        // Create roles and permissions
        foreach ($rolesWithPermissions as $role => $permissions) {
            // Create the role if it doesn't exist
            $roleInstance = Role::firstOrCreate(['name' => $role]);

            // Loop through each permission
            foreach ($permissions as $permission) {
                // Create the permission if it doesn't exist
                $permissionInstance = Permission::firstOrCreate(['name' => $permission]);

                // Assign the permission to the role
                $roleInstance->givePermissionTo($permissionInstance);
            }
        }
    }

    /**
     * Truncate all the necessary tables for spatie/laravel-permission.
     *
     * @return void
     */
    protected function truncatePermissionTables()
    {
        // Disable foreign key checks to avoid constraint issues
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Truncate the pivot tables
        DB::table('model_has_roles')->truncate();
        DB::table('role_has_permissions')->truncate();
        DB::table('model_has_permissions')->truncate();

        // Truncate the roles and permissions tables
        Role::truncate();
        Permission::truncate();

        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
