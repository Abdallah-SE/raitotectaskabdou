<?php


namespace App\Repositories;

use App\Models\Languages\Language;

class LanguageRepository
{
    public function getAvailableLanguages()
    {
        $languages = Language::get();
        return $languages;
    }
}
