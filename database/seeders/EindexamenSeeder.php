<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EindexamenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('eindexamen')->insert([
            [
                'examen_naam' => 'Zwemvaardigheid Examen 1',
                'beschrijving' => 'Het eerste zwemvaardigheid examen voor beginners.',
                'duur' => 60, // Duur in minuten
                'tijdstip' => '2024-09-30',
                'leerling_id' => 1, // Verwijzing naar leerling ID
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'examen_naam' => 'Zwemvaardigheid Examen 2',
                'beschrijving' => 'Het tweede zwemvaardigheid examen voor gevorderden.',
                'duur' => 90,
                'tijdstip' => '2024-10-05',
                'leerling_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'examen_naam' => 'Zwemvaardigheid Examen 3',
                'beschrijving' => 'Het derde zwemvaardigheid examen voor experts.',
                'duur' => 120,
                'tijdstip' => '2024-10-10',
                'leerling_id' => null, // Geen leerling gekoppeld
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
