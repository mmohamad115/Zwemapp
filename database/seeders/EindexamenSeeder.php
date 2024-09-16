<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Eindexamen;

class EindexamenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Eindexamen::create([
            'examen_naam' => 'Eindexamen Wiskunde',
            'beschrijving' => 'Een examen over wiskundige onderwerpen.',
            'duur' => 120,
            'tijdstip' => '2024-10-01',
        ]);

        Eindexamen::create([
            'examen_naam' => 'Eindexamen Nederlands',
            'beschrijving' => 'Een examen over Nederlandse taal en literatuur.',
            'duur' => 90,
            'tijdstip' => '2024-10-02',
        ]);

    }
}
