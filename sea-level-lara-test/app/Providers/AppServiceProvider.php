<?php

namespace App\Providers;

use App\Services\V1\ShipmentService;
use App\Strategies\V1\ShipmentStrategyFactory;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(ShipmentService::class, function ($app) {
            return new ShipmentService(new ShipmentStrategyFactory);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
