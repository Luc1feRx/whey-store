<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tạo các vai trò
        $SuperadminRole = Role::create(['name' => 'super admin', 'guard_name' => 'admin']);
        $adminRole = Role::create(['name' => 'admin', 'guard_name' => 'admin']);

        // Gán quyền cho các vai trò
        $adminPermission = Permission::create(['name' => 'manage user', 'guard_name' => 'admin']);
        $storagePermission = Permission::create(['name' => 'manage storage', 'guard_name' => 'admin']);
        $decentralizedPermission = Permission::create(['name' => 'manage decentralized', 'guard_name' => 'admin']);

        $SuperadminRole->givePermissionTo($adminPermission);
        $SuperadminRole->givePermissionTo($storagePermission);
        $SuperadminRole->givePermissionTo($decentralizedPermission);
    }
}
