<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $viewer = User::create([
            'name' => 'viewer',
            'email' => 'viewer@link.test',
            'password' => bcrypt('12345678') 
        ]);
        $viewer->assignRole('viewer');

        $maker = User::create([
            'name' => 'maker',
            'email' => 'maker@link.test',
            'password' => bcrypt('12345678') 
        ]);
        $maker->assignRole('maker');
        
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@link.test',
            'password' => bcrypt('12345678') 
        ]);
        $admin->assignRole('administrator');
    }
}
