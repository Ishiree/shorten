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
            'url_platform' => 'https://kitabisa.com/orang-baik/08bbe0ee2108cf456581b0a283ea4c37',
            'nama' => 'kitabisa'
        ]);
        Platform::create([
            'url_platform' => 'https://www.amalsholeh.com/lembaga/213839',
            'nama' => 'amalsholeh'
        ]);
        Platform::create([
            'url_platform' => 'https://donasiberkah.id/',
            'nama' => 'donasiberkah'
        ]);
    }
}
