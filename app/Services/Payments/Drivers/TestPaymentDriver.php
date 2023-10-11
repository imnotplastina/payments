<?php

namespace App\Services\Payments\Drivers;

class TestPaymentDriver extends PaymentDriver
{
    public function foo(): string
    {
        return 'bar';
    }
}
