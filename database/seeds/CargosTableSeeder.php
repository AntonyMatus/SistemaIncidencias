<?php

use Illuminate\Database\Seeder;

class CargosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Xhunter\Models\Cargo::create([
            'cargo' => 'Comandante'
        ]);

        Xhunter\Models\Cargo::create([
            'cargo' => 'Primer Oficial'
        ]);

        Xhunter\Models\Cargo::create([
            'cargo' => 'Oficial'
        ]);

        Xhunter\Models\Cargo::create([
            'cargo' => 'SubOficial'
        ]);

        Xhunter\Models\Cargo::create([
            'cargo' => 'Bombero'
        ]);

    }
}
