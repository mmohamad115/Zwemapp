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
                'leerling_id' => 1, // Verwijzing naar een leerling ID
                'zwem_docent_id' => 1, // Verwijzing naar een zwemdocent ID
                'zwemles_id' => 1, // Verwijzing naar een zwemles ID
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'groepNaam' => 'Groep B',
                'leerling_id' => 2, // Verwijzing naar een andere leerling ID
                'zwem_docent_id' => 2, // Verwijzing naar een andere zwemdocent ID
                'zwemles_id' => 2, // Verwijzing naar een andere zwemles ID
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'groepNaam' => 'Groep C',
                'leerling_id' => 3, // Verwijzing naar nog een leerling ID
                'zwem_docent_id' => 1, // Verwijzing naar dezelfde docent ID
                'zwemles_id' => 3, // Verwijzing naar een andere zwemles ID
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
