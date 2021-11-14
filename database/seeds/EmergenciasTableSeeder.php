<?php

use Illuminate\Database\Seeder;

class EmergenciasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Xhunter\Models\Emergencia::create([
            'tipo_emergencia' => 'Retiro de objetos y animales en la vía pública'
        ]);
        Xhunter\Models\Emergencia::create([
            'tipo_emergencia' => 'Indendios de basura y maleza'
        ]);
        Xhunter\Models\Emergencia::create([
            'tipo_emergencia' => 'Servicios diversos'
        ]);
        Xhunter\Models\Emergencia::create([
            'tipo_emergencia' => 'Auxilio social de apoyo con agua'
        ]);
        Xhunter\Models\Emergencia::create([
            'tipo_emergencia' => 'Servicios Improcedentes'
        ]);
        Xhunter\Models\Emergencia::create([
            'tipo_emergencia' => 'Conatos de incendios'
        ]);
        Xhunter\Models\Emergencia::create([
            'tipo_emergencia' => 'Fugas de cilindros de gas LP.'
        ]);
        Xhunter\Models\Emergencia::create([
            'tipo_emergencia' => 'Combate de abejas y avispas'
        ]);
        Xhunter\Models\Emergencia::create([
            'tipo_emergencia' => 'Retiro de objetos y animales en domicilios'
        ]);
        Xhunter\Models\Emergencia::create([
            'tipo_emergencia' => 'Platicas de Bomberismo'
        ]);
        Xhunter\Models\Emergencia::create([
            'tipo_emergencia' => 'Incendios de vehículos'
        ]);
        Xhunter\Models\Emergencia::create([
            'tipo_emergencia' => 'Incendios de casa habitación'
        ]);
        Xhunter\Models\Emergencia::create([
            'tipo_emergencia' => 'Entrega de constancias de fuga de gas LP.'
        ]);
        Xhunter\Models\Emergencia::create([
            'tipo_emergencia' => 'Incendios  de comercios'
        ]);
        Xhunter\Models\Emergencia::create([
            'tipo_emergencia' => 'Entrega de animales capturados y objetos a instituciones y a particulares'
        ]);
        Xhunter\Models\Emergencia::create([
            'tipo_emergencia' => 'Complementarias'
        ]);
        
    }
}

