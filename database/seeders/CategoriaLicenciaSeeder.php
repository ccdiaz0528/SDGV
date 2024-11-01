<?php

namespace Database\Seeders;

use App\Models\CategoriaLicencia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaLicenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = [
            ['nombre' => 'A1', 'descripcion' => 'Motos de baja cilindrada'],
            ['nombre' => 'A2', 'descripcion' => 'Motos de alta cilindrada'],
            ['nombre' => 'B1', 'descripcion' => 'Automóviles, camperos, camionetas y microbuses de servicio particular.'],
            ['nombre' => 'B2', 'descripcion' => 'Camiones, rígidos, busetas y buses para el servicio particular.'],
            ['nombre' => 'B3', 'descripcion' => 'Vehículos articulados de servicio particular.'],
            ['nombre' => 'C1', 'descripcion' => 'Automóviles, camperos, camionetas y microbuses de servicio público.'],
            ['nombre' => 'C2', 'descripcion' => 'Camiones, rígidos, busetas y buses para el servicio público.'],
            ['nombre' => 'C3', 'descripcion' => 'Vehículos articulados para el servicio público'],

        ];

        foreach ($categorias as $categoria) {
            CategoriaLicencia::create($categoria);
        }
    }
}
