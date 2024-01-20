<?php

namespace App\Providers;

use App\ViewComposers\LanguageComposer;
use Illuminate\Support\Facades;
use Illuminate\Support\ServiceProvider;

class LanguageFoundServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Using class based composers...
        Facades\View::composer('*', LanguageComposer::class);
 
       
    }
    
}
