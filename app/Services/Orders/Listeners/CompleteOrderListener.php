<?php

namespace App\Services\Orders\Listeners;


use App\Services\Payments\Models\Payment;

class CompleteOrderListener
{
    /**
     * Create the event listener.
     */
    public function __construct(
        private readonly Payment $event
    ) {
    }

    /**
     * Handle the event.
     */
    public function handle(): void
    {
        info('Order completed: ' . $this->event->uuid);
    }
}
