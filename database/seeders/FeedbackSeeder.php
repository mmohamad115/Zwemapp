<?php

namespace Database\Seeders;

use App\Models\Feedback;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Feedback::create([
            'leerling_id' => 1,
            'zwem_docent_id' => 1,
            'content' => 'Great progress in swimming!',
            'aanmaakdatum' => now()
        ],
        [
            'leerling_id' => 2,
            'zwem_docent_id' => 2,
            'content' => 'Needs improvement in backstroke.',
            'aanmaakdatum' => now()
        ]);

        
    }
}
