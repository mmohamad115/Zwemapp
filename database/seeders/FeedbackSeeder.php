<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('feedback')->insert([
            [
                'content' => 'Goede vooruitgang, blijf oefenen op je armbewegingen.',
                'aanmaakdatum' => '2024-09-01',
                'leerling_id' => 1,
                'zwem_docent_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'content' => 'Je techniek is goed, maar let op je ademhaling.',
                'aanmaakdatum' => '2024-09-02',
                'leerling_id' => 2,
                'zwem_docent_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'content' => 'Je hebt het goed gedaan, probeer de volgende keer iets sneller te zwemmen.',
                'aanmaakdatum' => '2024-09-03',
                'leerling_id' => 3,
                'zwem_docent_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
