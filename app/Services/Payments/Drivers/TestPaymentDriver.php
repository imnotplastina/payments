<?php

namespace App\Services\Payments\Drivers;

use App\Services\Payments\Models\Payment;
use Illuminate\Contracts\View\View;

class TestPaymentDriver extends PaymentDriver
{
    public function view(Payment $payment): View
    {
        return view("payments::test", compact('payment'));
    }
}
