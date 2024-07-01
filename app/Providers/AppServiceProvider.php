<?php

namespace App\Providers;

use App\Models\Actuality;
use App\Observers\ActualityObserver;
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
        Actuality::observe(ActualityObserver::class);
    }
}
