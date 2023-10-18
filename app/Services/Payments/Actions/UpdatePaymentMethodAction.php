<?php

namespace App\Services\Payments\Actions;

use App\Services\Payments\Models\Payment;
use App\Services\Payments\Models\PaymentMethod;

final class UpdatePaymentMethodAction
{
    public function __construct(
        private readonly PaymentMethod $method,
        private readonly Payment $payment,
    ) {
    }

    public function handle(): Payment
    {
        $this->payment->update([
            'method_id' => $this->method->id,
            'driver' => $this->method->driver,
        ]);

        return $this->payment;
    }
}
