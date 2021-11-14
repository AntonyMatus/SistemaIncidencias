<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionTableSeeder::class);
        $this->call(CargosTableSeeder::class);
        $this->call(PersonalTableSeeder::class);
        $this->call(VehiculosTableSeeder::class);
        $this->call(EmergenciasTableSeeder::class);
    }
}
