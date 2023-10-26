<?php

namespace App\Services\Subscriptions;

use App\Services\Payments\Events\PaymentCompletedEvent;
use App\Services\Subscriptions\Listeners\CompleteSubscriptionListener;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class SubscriptionServiceProvider extends ServiceProvider
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
            'subscription' => 'App\Services\Subscriptions\Models\Subscription',
        ]);

        Event::listen(PaymentCompletedEvent::class, CompleteSubscriptionListener::class);

        if ($this->app->runningInConsole()) {
            $this->loadMigrationsFrom(__DIR__ . '/Migrations');
        }
    }
}
