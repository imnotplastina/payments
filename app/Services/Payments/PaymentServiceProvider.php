<?php

namespace App\Services\Payments;

use App\Services\Payments\Command\InstallPaymentsCommand;
use Illuminate\Support\ServiceProvider;

class PaymentServiceProvider extends ServiceProvider
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
        $this->loadViewsFrom(__DIR__ . '/Views', 'payments');

        $this->publishes([
            __DIR__ . '/Views' => resource_path('views/vendor/payments')
        ], 'payments');

        if ($this->app->runningInConsole()) {
            $this->loadMigrationsFrom(__DIR__ . '/Migrations');

            $this->commands([
                InstallPaymentsCommand::class,
            ]);
        }
    }
}
