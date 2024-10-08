<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('groepen')->insert([
            [
                'groepNaam' => 'Groep A',
                'zwem_docent_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'groepNaam' => 'Groep B',
                'zwem_docent_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'groepNaam' => 'Groep C',
                'zwem_docent_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
