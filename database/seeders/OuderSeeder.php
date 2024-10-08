<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OuderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ouders')->insert([
            [
                'voornaam' => 'Cristiano',
                'achternaam' => 'Ronaldo',
                'user_id' => 1, // Verwijzing naar de eerste gebruiker (ouder)
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'voornaam' => 'Limonel',
                'achternaam' => 'Nessi',
                'user_id' => 2, // Verwijzing naar de tweede gebruiker (ouder)
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'voornaam' => 'Mohamad',
                'achternaam' => 'Mohamad',
                'user_id' => 3, // Verwijzing naar de tweede gebruiker (ouder)
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

    }
}
