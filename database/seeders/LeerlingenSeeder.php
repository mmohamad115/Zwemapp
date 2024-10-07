<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LeerlingenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('leerlingen')->insert([
            [
                'voornaam' => 'Jan',
                'achternaam' => 'Jansen',
                'geboortedatum' => '2005-06-15',
                'diploma' => 'A',
                'ouder_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'voornaam' => 'Pieter',
                'achternaam' => 'Pietersen',
                'geboortedatum' => '2006-04-12',
                'diploma' => 'B',
                'ouder_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'voornaam' => 'Anna',
                'achternaam' => 'De Vries',
                'geboortedatum' => '2007-09-22',
                'diploma' => 'C',
                'ouder_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
