<?php

namespace App\Providers;

use App\Models\Actuality;
use App\Services\DashboardService;
use App\Observers\ActualityObserver;
use App\Repositories\GroupeRepository;
use App\Repositories\ReportsRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\ProvidersRepository;
use App\Services\DashboardServiceInterface;
use App\Repositories\GroupeRepositoryInterface;
use App\Repositories\ReportsRepositoryInterface;
use App\Repositories\ProvidersRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(GroupeRepositoryInterface::class, GroupeRepository::class);
        $this->app->singleton(ProvidersRepositoryInterface::class, ProvidersRepository::class);
        $this->app->singleton(ReportsRepositoryInterface::class, ReportsRepository::class);
        $this->app->singleton(DashboardServiceInterface::class, DashboardService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Actuality::observe(ActualityObserver::class);
    }
}
