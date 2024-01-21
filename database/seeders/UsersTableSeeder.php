<?php

namespace Database\Seeders;

use App\Models\Users\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\Languages\Language;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Users\UserTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'email' => 'user1@example.com',
                'password' => Hash::make('password1'),
                'remember_token' => Str::random(10),
            ],
            [
                'email' => 'user2@example.com',
                'password' => Hash::make('password2'),
                'remember_token' => Str::random(10),
            ],
            [
                'email' => 'user3@example.com',
                'password' => Hash::make('password3'),
                'remember_token' => Str::random(10),
            ],
        ];

        foreach ($users as $user) {
            $user = User::create($user);

            $languages = Language::all();
            foreach ($languages as $language) {
                UserTranslation::create([
                    'user_id' => $user->id,
                    'language_id' => $language->id,
                    'name' => Str::random(5) . '_' . $language->code . " " . $language->code ,
                ]);
            }
        }
    }
}
