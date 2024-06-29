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
    // TODO:開発環境に左右されるので、条件分岐で書けないか検討
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
