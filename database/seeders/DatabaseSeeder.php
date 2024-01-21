<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\ItemsTableSeeder;
use Database\Seeders\UsersTableSeeder;
use Database\Seeders\LanguagesTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            LanguagesTableSeeder::class,

            UsersTableSeeder::class,
            ItemsTableSeeder::class,

         ]); 
    }
}
