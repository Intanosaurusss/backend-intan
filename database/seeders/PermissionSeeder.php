<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Buat Permission disini tinggal copy paste dan ganti nama
        Permission::firstOrCreate(['name' => 'users.create', 'guard_name' => 'api']);
        Permission::firstOrCreate(['name' => 'users.show', 'guard_name' => 'api']);
        Permission::firstOrCreate(['name' => 'databarang.create', 'guard_name' => 'api']);
        Permission::firstOrCreate(['name' => 'databarang.update', 'guard_name' => 'api']);
        Permission::firstOrCreate(['name' => 'databarang.destroy', 'guard_name' => 'api']);
        Permission::firstOrCreate(['name' => 'databarang.show', 'guard_name' => 'api']);
        
        Permission::firstOrCreate(['name' => 'dataservis.create', 'guard_name' => 'api']);
        Permission::firstOrCreate(['name' => 'dataservis.update', 'guard_name' => 'api']);
        Permission::firstOrCreate(['name' => 'dataservis.destroy', 'guard_name' => 'api']);
        Permission::firstOrCreate(['name' => 'dataservis.show', 'guard_name' => 'api']);

        //ngasih permission ke role yang sudah dibuat
        $adminRole = Role::where('name', 'admin')->first();
        $adminRole->givePermissionTo([
            'users.create'
        ]);


        //ngasih permission ke role user 
        $userRole = Role::where('name', 'user')->first();
        $userRole->givePermissionTo([
            'users.show'
        ]);
    }
}
