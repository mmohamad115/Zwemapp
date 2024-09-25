<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('users')->insert([
            [
                'name' => 'Cristiano Ronaldo',
                'email' => 'cristiano.ronaldo@example.com',
                'password' => Hash::make('password'),
                'role' => 'ouder',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Limonel Nessi',
                'email' => 'limonel.nessi@example.com',
                'password' => Hash::make('password'),
                'role' => 'ouder',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Michael Johnson',
                'email' => 'michael.johnson@example.com',
                'password' => Hash::make('password'),
                'role' => 'zwem_docent',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sarah Williams',
                'email' => 'sarah.williams@example.com',
                'password' => Hash::make('password'),
                'role' => 'zwem_docent',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        $this->call(OuderSeeder::class);
        $this->call(ZwemDocentSeeder::class);
        $this->call(LeerlingenSeeder::class);
        $this->call(FeedbackSeeder::class);
        $this->call(ZwemlessenSeeder::class);
        $this->call(Groepseeder::class);
        $this->call(EindexamenSeeder::class);
    }
}
