<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::create(['name' => 'admin', 'guard_name' => 'admin']);
        Admin::create([
            'name' => 'super admin',
            'email' => 'superadmin@gmail.com',
            'password' => '$2y$10$rtsrfCWxiSmxPsgsympZAe1LS0mwSieKasASdznLj68J1zK5NwRyS', // password
        ])->assignRole('super admin');

        Admin::create([
            'name' => 'admin1',
            'email' => 'admin1@gmail.com',
            'password' => '$2y$10$rtsrfCWxiSmxPsgsympZAe1LS0mwSieKasASdznLj68J1zK5NwRyS', // password
        ])->assignRole('admin');
    }
}
