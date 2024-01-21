<?php

namespace Database\Seeders;

use App\Models\Items\Item;
use App\Models\Languages\Language;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'price' => 100,
            ],
            [
                'price' => 200,
            ],
            [
                'price' => 300,
            ],
        ];

        foreach ($items as $item) {
            $item = Item::create($item);

            $languages = Language::all();
            foreach ($languages as $language) {
                DB::table('item_translations')->insert([
                    'item_id' => $item->id,
                    'language_id' => $language->id,
                    'name' => Str::random(7) . " " . $language->code,
                ]);
            }
        }
    }
}
