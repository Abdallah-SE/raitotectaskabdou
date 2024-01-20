<?php

namespace App\Http\Controllers\Users;

use App\Models\Users\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Services\LanguageService;
use App\Http\Controllers\Controller;
// use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    protected $languageService;

    public function __construct(LanguageService $_languageService)
    {
        $this->languageService = $_languageService;
    }
    protected function index(Request $request)
    {
        if ($request->ajax()) {
            $query = User::leftJoin('users_translations', function ($join) {
                $join->on('users.id', '=', 'users_translations.user_id')
                     ->where('users_translations.language_id', $this->languageService->getLangId());
             })->select('users.id', 'users_translations.name');
             
            return DataTables::of($query)->make(true);
        }
        return view('users.index');
    }
}
