<?php

namespace App\Services\Payments\Actions;

use App\Services\Payments\Enums\PaymentStatusEnum;
use App\Services\Payments\Models\Payment;

final class CancelPaymentAction
{
    public function __construct(
        private readonly Payment $payment
    ) {
    }

    public function handle(): Payment
    {
        $this->payment->update([
            'status' => PaymentStatusEnum::Cancelled,
        ]);

        return $this->payment;
    }
}
