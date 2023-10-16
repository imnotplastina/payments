<?php

namespace App\Services\Payments;

use App\Services\Orders\Models\Order;
use App\Services\Payments\Actions\CreatePaymentAction;
use App\Services\Payments\Drivers\PaymentDriver;
use App\Services\Payments\Drivers\PaymentDriverFactory;
use App\Services\Payments\Enums\PaymentDriverEnum;

class PaymentService
{
    public function getDriver(PaymentDriverEnum $driver): PaymentDriver
    {
        return (new PaymentDriverFactory)->make($driver);
    }

    public function createPayment(Order $order): CreatePaymentAction
    {
        return new CreatePaymentAction($order);
    }
}
