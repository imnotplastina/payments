<?php

namespace App\Services\Payments\Events;

use App\Services\Payments\Models\Payment;

class PaymentCompletedEvent
{
    /**
     * Create a new event instance.
     */
    public function __construct(
        private readonly Payment $payment
    ) {
        $this->payment->payable->onPaymentComplete();
    }
}
