<?php



namespace App\Http\Controllers\Settings;
 
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller;
use App\Services\LanguageService;
 
class LanguageController extends Controller
{
    protected $languageService;
    public function __construct(LanguageService $_languageService)
    {
        $this->languageService = $_languageService;
    }

    public function switch(Request $request, $lang)
    {
        $this->languageService->switch($request, $lang);

        return redirect()->back();
    }
}
