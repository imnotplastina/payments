<?php

namespace App\Services\Tinkoff\DTOs;

class CreatePaymentData
{
    public function __construct(
        public readonly int $amount,
        public readonly string $orderId,
        public readonly string $successUrl,
        public readonly string $failureUrl,
        public readonly string $callbackUrl,
    ) {
    }
}
