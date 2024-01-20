<?php


namespace App\ViewComposers;

use Illuminate\View\View;
use App\Http\Controllers\Controller;
use App\Repositories\LanguageRepository;

class LanguageComposer extends Controller
{
    protected $languageRepository;
    public function __construct(LanguageRepository $_languageRepository)
    {
        $this->languageRepository = $_languageRepository;
    }

    public function compose(View $view)
    {
        $availableLanguages = $this->languageRepository->getAvailableLanguages();
        $view->with('availableLanguages', $availableLanguages);
    }
}
