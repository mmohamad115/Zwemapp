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
                'duurtijd' => '1 uur',
                'tijdstip' => '2024-09-20 10:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'naam' => 'Gevorderden Zwemles',
                'beschrijving' => 'Voor de meer ervaren zwemmers om hun technieken te verbeteren.',
                'duurtijd' => '1.5 uur',
                'tijdstip' => '2024-09-21 14:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'naam' => 'Zwemles voor kinderen',
                'beschrijving' => 'Een zwemles speciaal gericht op kinderen van 5 tot 10 jaar.',
                'duurtijd' => '45 minuten',
                'tijdstip' => '2024-09-22 09:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
