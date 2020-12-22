<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'viewer',
            'guard_name' => 'web'
        ]);
    
        Role::create([
            'name' => 'maker',
            'guard_name' => 'web'
        ]);

        $viewer = Role::find(1);

        
    }
}
