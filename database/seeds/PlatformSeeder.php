<?php

use App\Platform;
use Illuminate\Database\Seeder;

class PlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Platform::create([
            'kode' => 'KTBS',
            'nama' => 'kitabisa'
        ]);
        Platform::create([
            'kode' => 'AMLS',
            'nama' => 'amalsholeh'
        ]);
        Platform::create([
            'kode' => 'DBKH',
            'nama' => 'donasiberkah'
        ]);
    }
}
