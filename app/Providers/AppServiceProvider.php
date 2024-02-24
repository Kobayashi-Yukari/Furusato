<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\UrlGenerator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    //  local環境
    public function boot(): void
    {
        
    }
    // 本番環境
    // public function boot(UrlGenerator $url) 
    // {
    //     $url->forceScheme('https');
    // }
}
