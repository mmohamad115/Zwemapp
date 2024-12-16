<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrijzenSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('prijzen')->insert([
            [
                'naam' => 'A-Diploma',
                'beschrijving' => 'Het A-diploma is het eerste zwemdiploma dat kinderen kunnen halen. Met dit diploma leren kinderen de basisvaardigheden van het zwemmen.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'naam' => 'B-Diploma',
                'beschrijving' => 'Het B-diploma is het vervolg op het A-diploma. Kinderen leren hier meer zwemtechnieken en bouwen hun uithoudingsvermogen op.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'naam' => 'C-Diploma',
                'beschrijving' => 'Het C-diploma is het hoogste zwemdiploma van het Zwem-ABC. Hiermee worden alle zwemvaardigheden verder verbeterd en geperfectioneerd.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'naam' => 'Zwemvaardigheid 1',
                'beschrijving' => 'Het eerste niveau van de zwemvaardigheidsdiploma\'s, gericht op verdere ontwikkeling van zwemtechnieken.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'naam' => 'Zwemvaardigheid 2',
                'beschrijving' => 'Het tweede niveau van de zwemvaardigheidsdiploma\'s met meer uitdagende oefeningen.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'naam' => 'Zwemvaardigheid 3',
                'beschrijving' => 'Het hoogste niveau van de zwemvaardigheidsdiploma\'s voor gevorderde zwemmers.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
} 