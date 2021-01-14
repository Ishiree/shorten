<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name' => 'view link',
            'guard_name' => 'web'
        ]);
    
        Permission::create([
            'name' => 'make link',
            'guard_name' => 'web'
        ]);
        
        Permission::create([
            'name' => 'delete link',
            'guard_name' => 'web'
        ]);

        Permission::create([
            'name' => 'administrator',
            'guard_name' => 'web'
        ]);
    }
}
