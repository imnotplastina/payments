<?php

namespace App\Services\Payments;

use App\Services\Orders\Models\Order;
use App\Services\Payments\Actions\CancelPaymentAction;
use App\Services\Payments\Actions\CompletePaymentAction;
use App\Services\Payments\Actions\CreatePaymentAction;
use App\Services\Payments\Actions\FindPaymentMethodAction;
use App\Services\Payments\Actions\GetPaymentAction;
use App\Services\Payments\Actions\UpdatePaymentMethodAction;
use App\Services\Payments\Contracts\Payable;
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

    public function createPayment(Payable $payable): CreatePaymentAction
    {
        return new CreatePaymentAction($payable);
    }

    public function getPayment(string $uuid): GetPaymentAction
    {
        return new GetPaymentAction($uuid);
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

    public function cancelPayment(Payment $payment): CancelPaymentAction
    {
        return new CancelPaymentAction($payment);
    }
}
