<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LanguagesTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('languages')->insert([
            ['native_name' => 'العربية', 'code' => 'ar', 'flag' => 'eg.png'],
            ['native_name' => 'English', 'code' => 'en', 'flag' => 'usa.png'],
        ]);
    }
}
