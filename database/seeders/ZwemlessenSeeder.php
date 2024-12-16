<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ZwemlessenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('zwemlessen')->insert([
            [
                'naam' => 'Beginners Zwemles',
                'beschrijving' => 'Een zwemles voor beginners waar basis zwemtechnieken worden aangeleerd.',
                'duurtijd' => '60',
                'datum' => '2024-09-20',
                'tijd' => '10:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'naam' => 'Gevorderden Zwemles',
                'beschrijving' => 'Voor de meer ervaren zwemmers om hun technieken te verbeteren.',
                'duurtijd' => '70',
                'datum' => '2024-09-21',
                'tijd' => '14:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'naam' => 'Zwemles voor kinderen',
                'beschrijving' => 'Een zwemles speciaal gericht op kinderen van 5 tot 10 jaar.',
                'duurtijd' => '90',
                'datum' => '2024-09-22',
                'tijd' => '09:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
