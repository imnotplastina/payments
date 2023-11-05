<?php

namespace App\Services\Payments\Drivers;

use App\Services\Payments\Models\Payment;
use App\Services\Tinkoff\DTOs\CreatePaymentData;
use App\Services\Tinkoff\TinkoffConfig;
use App\Services\Tinkoff\TinkoffService;
use Illuminate\Contracts\View\View;

class TinkoffPaymentDriver extends PaymentDriver
{
    public function view(Payment $payment): View
    {
        $service = new TinkoffService(
            new TinkoffConfig(
                terminal: config('services.tinkoff.terminal'),
                password: config('services.tinkoff.password')
            )
        );

        $payment = $service->createPayment(
            new CreatePaymentData(
                amount: $payment->amount->value() * 100,
                orderId: $payment->uuid,
                successUrl: route('payments.success', ['uuid' => $payment->uuid]),
                failureUrl: route('payments.failure', ['uuid' => $payment->uuid]),
                callbackUrl: 'https://webhook.site/7fe74199-2226-44db-8622-6b3b6c165852'
            )
        );

        return view('payments::tinkoff', compact('payment'));
    }
}
