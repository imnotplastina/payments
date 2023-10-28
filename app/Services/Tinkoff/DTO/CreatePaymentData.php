<?php

namespace App\Services\Tinkoff\DTO;

class CreatePaymentData
{
    public function __construct(
        public readonly int $amount,
        public readonly string $order,
        public readonly string $successUrl,
        public readonly string $failureUrl,
        public readonly string $callbackUrl,
    ) {
    }
}
