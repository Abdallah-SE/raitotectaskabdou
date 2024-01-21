<?php

namespace App\Services;

use App\Models\Languages\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LanguageService
{
    /**
     * Switch the application's language.
     *
     * @param Request $request
     * @param string $lang
     * @return void
     */
    public function switch(Request $request, $lang)
    {
        // Validate the requested language
        if (!in_array($lang, ['en', 'ar'])) {
            abort(400);
        }

        // Store the selected language in the session
        $request->session()->put('locale', $lang);

        // Set the application's locale
        App::setLocale($lang);
    }
    public function getLangId()
    {
        $language = Language::where('code', app()->getLocale())->first();
        return $language?->id ?? null;
    }
}
