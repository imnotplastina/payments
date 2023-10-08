<?php

namespace App\Services\Orders;

use App\Services\Orders\Commands\InstallOrdersFactoryCommand;
use Illuminate\Support\ServiceProvider;

class OrderServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->loadMigrationsFrom(__DIR__ . '/Migrations');

            $this->commands([
                InstallOrdersFactoryCommand::class,
            ]);
        }
    }
}
