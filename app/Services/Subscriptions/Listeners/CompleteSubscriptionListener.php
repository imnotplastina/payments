<?php

namespace App\Services\Subscriptions\Listeners;

use App\Services\Payments\Models\Payment;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CompleteSubscriptionListener
{
    /**
     * Create the event listener.
     */
    public function __construct(
        private readonly Payment $payment,
    ) {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        info('Subscription completed' . $this->payment->uuid);
    }
}
