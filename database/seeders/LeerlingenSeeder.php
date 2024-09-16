<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            'leerling_id' => '1',
            'voornaam' => 'Charles',
            'achternaam' => 'Graham',
            'geboortedatum' => '2012-06-06',
            'diploma' => 'Diploma A, B en C',
        ]);
    }
}
