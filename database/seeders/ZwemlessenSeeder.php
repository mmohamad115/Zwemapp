<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            'zwemles_id' => '1',
            'naam' => 'Beginners Zwemles',
            'beschrijving' => 'Introductie tot basis zwemtechnieken.',
            'duurtijd' => '45',
            'tijdstip' => '2026-04-18 10:30:00',
        ]);
    }
}
