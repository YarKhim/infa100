<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

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
    public function boot(): void
    {
        //dd($_SERVER);
        //dd(request()->getPort(), $_SERVER);
        if (config('app.env') === 'local') { // можно ограничить только для локальной разработки
            URL::forceRootUrl(config('app.url'));
        }
        //
    }
}
