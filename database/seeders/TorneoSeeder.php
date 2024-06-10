<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TorneoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('torneos')->insert([
            [
                'nombre' => 'Abierto de Australia',
                'modalidad' => 'Individual',
                'superficie' => 'Dura',
                'vacantes' => 1,
                'categoria' => 'Grand Slam',
                'premios' => 71000000.00,
                'fechaInicio' => '2023-01-16',
                'fechaFin' => '2023-01-29',
                'imagen' => 'https://via.placeholder.com/150',
                'isDelete' => false,
            ],
            [
                'nombre' => 'Roland Garros',
                'modalidad' => 'Individual',
                'superficie' => 'Arcilla',
                'vacantes' => 2,
                'categoria' => 'Grand Slam',
                'premios' => 42000000.00,
                'fechaInicio' => '2023-05-22',
                'fechaFin' => '2023-06-11',
                'imagen' => 'https://via.placeholder.com/150',
                'isDelete' => false,
            ],
            [
                'nombre' => 'Wimbledon',
                'modalidad' => 'Individual',
                'superficie' => 'Hierba',
                'vacantes' => 3,
                'categoria' => 'Grand Slam',
                'premios' => 38000000.00,
                'fechaInicio' => '2023-06-26',
                'fechaFin' => '2023-07-16',
                'imagen' => 'https://via.placeholder.com/150',
                'isDelete' => false,
            ],
            [
                'nombre' => 'Abierto de Estados Unidos',
                'modalidad' => 'Individual',
                'superficie' => 'Dura',
                'vacantes' => 1,
                'categoria' => 'Grand Slam',
                'premios' => 57000000.00,
                'fechaInicio' => '2023-08-28',
                'fechaFin' => '2023-09-10',
                'imagen' => 'https://via.placeholder.com/150',
                'isDelete' => false,
            ],
        ]);
    }
}
