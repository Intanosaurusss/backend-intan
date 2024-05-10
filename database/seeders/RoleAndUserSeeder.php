<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class RoleAndUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create roles
        $adminRole = Role::create(['name' => 'admin', 'guard_name' => 'api']);
        $userRole = Role::create(['name' => 'user', 'guard_name' => 'api']);
        
        // Create admin user and assign role
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin1@gmail.com',
            'password' => bcrypt('password'),
            'nisn' => '12345678',
        ]);
        $admin->assignRole('admin');

        // Create regular user and assign role
        $user = User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => bcrypt('password'),
            'nisn' => '12345677',
        ]);
        $user->assignRole('user');
    }
}
