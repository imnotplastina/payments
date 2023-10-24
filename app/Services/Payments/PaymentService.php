<?php

namespace App\Services\Payments;

use App\Services\Orders\Models\Order;
use App\Services\Payments\Actions\CompletePaymentAction;
use App\Services\Payments\Actions\CreatePaymentAction;
use App\Services\Payments\Actions\FindPaymentMethodAction;
use App\Services\Payments\Actions\UpdatePaymentMethodAction;
use App\Services\Payments\Drivers\PaymentDriver;
use App\Services\Payments\Drivers\PaymentDriverFactory;
use App\Services\Payments\Enums\PaymentDriverEnum;
use App\Services\Payments\Models\Payment;
use App\Services\Payments\Models\PaymentMethod;

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

    public function findPaymentMethod(string $methodId): FindPaymentMethodAction
    {
        return new FindPaymentMethodAction($methodId);
    }

    public function updatePaymentMethod(PaymentMethod $method, Payment $payment): UpdatePaymentMethodAction
    {
        return new UpdatePaymentMethodAction($method, $payment);
    }

    public function completePayment(Payment $payment): CompletePaymentAction
    {
        return new CompletePaymentAction($payment);
    }
}
