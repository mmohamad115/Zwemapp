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
                'voornaam' => 'Michael',
                'achternaam' => 'Johnson',
                'user_id' => 3, // Verwijzing naar de derde gebruiker (zwemdocent)
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'voornaam' => 'Sarah',
                'achternaam' => 'Williams',
                'user_id' => 4, // Verwijzing naar de vierde gebruiker (zwemdocent)
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
