<?php

namespace App\Services\Orders;

use App\Services\Orders\Commands\InstallOrdersFactoryCommand;
use App\Services\Orders\Listeners\CompleteOrderListener;
use App\Services\Payments\Actions\CompletePaymentAction;
use App\Services\Payments\Events\PaymentCompletedEvent;
use App\Services\Payments\Models\Payment;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\Event;
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
        Relation::enforceMorphMap([
            'order' => 'App\Services\Orders\Models\Order',
        ]);

        if ($this->app->runningInConsole()) {
            $this->loadMigrationsFrom(__DIR__ . '/Migrations');

            $this->commands([
                InstallOrdersFactoryCommand::class,
            ]);
        }

        Event::listen(PaymentCompletedEvent::class, CompleteOrderListener::class);
    }
}
