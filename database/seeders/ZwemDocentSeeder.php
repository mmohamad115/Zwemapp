<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ZwemDocentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('zwem_docenten')->insert([
            [
                'voornaam' => 'Jan',
                'achternaam' => 'Jansen',
                'groep_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'voornaam' => 'Piet',
                'achternaam' => 'Pietersen',
                'groep_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'voornaam' => 'Klaas',
                'achternaam' => 'Klaassen',
                'groep_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
