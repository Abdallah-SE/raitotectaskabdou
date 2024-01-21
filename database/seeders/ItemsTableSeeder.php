<?php

namespace Database\Seeders;

use App\Models\Items\Item;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\Languages\Language;
use Illuminate\Support\Facades\DB;
use App\Models\Items\ItemTranslation;

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
                ItemTranslation::create([
                    'item_id' => $item->id,
                    'language_id' => $language->id,
                    'name' => Str::random(7) . " " . $language->code,
                ]);
            }
        }
    }
}
