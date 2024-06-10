<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TenistaSeeder extends Seeder
{
    public function run()
    {
        $tenistas = [
            [
                'nombre' => 'Roger',
                'apellido' => 'Federer',
                'ranking' => 1,
                'pais' => 'Suiza',
                'FechaNacimiento' => '1981-08-08',
                'Altura' => 185,
                'peso' => 85,
                'Mano' => 'Derecha',
                'reves' => 'Una mano',
                'entrenador' => 'Ivan Ljubicic',
                'totalDineroGanado' => 130000000,
                'numeroVictorias' => 1242,
                'numeroDerrotas' => 271,
                'imagen' => 'https://via.placeholder.com/150',
                'puntos' => 10120,
            ],
            [
                'nombre' => 'Rafael',
                'apellido' => 'Nadal',
                'ranking' => 2,
                'pais' => 'España',
                'FechaNacimiento' => '1986-06-03',
                'Altura' => 185,
                'peso' => 85,
                'Mano' => 'Izquierda',
                'reves' => 'Dos manos',
                'entrenador' => 'Carlos Moyá',
                'totalDineroGanado' => 120000000,
                'numeroVictorias' => 1028,
                'numeroDerrotas' => 210,
                'imagen' => 'https://via.placeholder.com/150',
                'puntos' => 9850,
            ],
            [
                'nombre' => 'Novak',
                'apellido' => 'Djokovic',
                'ranking' => 3,
                'pais' => 'Serbia',
                'FechaNacimiento' => '1987-05-22',
                'Altura' => 188,
                'peso' => 77,
                'Mano' => 'Derecha',
                'reves' => 'Dos manos',
                'entrenador' => 'Goran Ivanisevic',
                'totalDineroGanado' => 140000000,
                'numeroVictorias' => 950,
                'numeroDerrotas' => 195,
                'imagen' => 'https://via.placeholder.com/150',
                'puntos' => 10220,
            ],
        ];

        foreach ($tenistas as $tenista) {
            $fechaNacimiento = Carbon::parse($tenista['FechaNacimiento']);
            $edad = $fechaNacimiento->age;

            DB::table('tenistas')->insert([
                'nombre' => $tenista['nombre'],
                'apellido' => $tenista['apellido'],
                'ranking' => $tenista['ranking'],
                'pais' => $tenista['pais'],
                'FechaNacimiento' => $tenista['FechaNacimiento'],
                'edad' => $edad,
                'Altura' => $tenista['Altura'],
                'peso' => $tenista['peso'],
                'Mano' => $tenista['Mano'],
                'reves' => $tenista['reves'],
                'entrenador' => $tenista['entrenador'],
                'totalDineroGanado' => $tenista['totalDineroGanado'],
                'numeroVictorias' => $tenista['numeroVictorias'],
                'numeroDerrotas' => $tenista['numeroDerrotas'],
                'imagen' => $tenista['imagen'],
                'puntos' => $tenista['puntos'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
