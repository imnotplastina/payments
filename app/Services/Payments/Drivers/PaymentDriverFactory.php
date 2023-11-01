<?php

namespace App\Services\Payments\Drivers;

use App\Services\Payments\Enums\PaymentDriverEnum;
use InvalidArgumentException;

class PaymentDriverFactory
{
    public function make(PaymentDriverEnum $driver): PaymentDriver
    {
        return match ($driver) {
            PaymentDriverEnum::Test => new TestPaymentDriver,
            PaymentDriverEnum::Tinkoff => new TinkoffPaymentDriver(),

            default => throw new InvalidArgumentException(
                "Драйвер [{$driver->value}] не поддерживается"),
        };
    }
}
