<?php

namespace App\Http\Controllers\Items;

use App\Models\Items\Item;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Services\LanguageService;
use App\Http\Controllers\Controller;
// use Yajra\DataTables\Facades\DataTables;

class ItemController extends Controller
{

    protected $languageService;

    public function __construct(LanguageService $_languageService)
    {
        $this->languageService = $_languageService;
    }

    protected function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Item::leftJoin('item_translations', function ($join) {
                $join->on('items.id', '=', 'item_translations.item_id')
                    ->where('item_translations.language_id', $this->languageService->getLangId());
            })->select('items.id', 'item_translations.name');

            return DataTables::of($query)->make(true);
        }
        return view('items.index');
    }
}
