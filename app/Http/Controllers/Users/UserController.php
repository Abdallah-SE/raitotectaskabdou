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

        if ($this->languageService !== null) {
            $languageId = $this->languageService->getLangId();
        } else {
            $languageId = null;
        }
        
        if ($request->ajax()) {


            $query = User::leftJoin('users_translations', function ($join) use ($languageId) {
                $join->on('users.id', '=', 'users_translations.user_id')
                    ->where('users_translations.language_id', $languageId);
            })->select('users.id', 'users_translations.name');

            // Check if the query returns any results
            if ($query->exists()) {
                return DataTables::of($query)->make(true);
            } else {
                // Return a special response indicating that the table is empty
                return response()->json(['message' => 'No users found']);
            }
        }
        return view('users.index');
    }
}
