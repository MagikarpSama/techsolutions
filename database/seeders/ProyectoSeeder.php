<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Proyecto;

class ProyectoSeeder extends Seeder
{
    public function run(): void
    {
        Proyecto::truncate();
        Proyecto::create([
            'nombre' => 'Inventario',
            'fecha_inicio' => '2025-08-01',
            'estado' => 'En Progreso',
            'responsable' => 'Lalo Landa',
            'monto' => 1500000,
            'created_by' => 2,
        ]);
        Proyecto::create([
            'nombre' => 'Web Corporativa',
            'fecha_inicio' => '2025-07-15',
            'estado' => 'Finalizado',
            'responsable' => 'Test Tester',
            'monto' => 800000,
            'created_by' => 3,
        ]);
        Proyecto::create([
            'nombre' => 'App Móvil',
            'fecha_inicio' => '2025-08-10',
            'estado' => 'Pendiente',
            'responsable' => 'Admin',
            'monto' => 2000000,
            'created_by' => 1,
        ]);
    }
}
