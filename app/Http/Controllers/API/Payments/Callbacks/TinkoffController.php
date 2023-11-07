<?php

namespace App\Http\Controllers\API\Payments\Callbacks;

use App\Http\Controllers\Controller;
use App\Services\Payments\Models\Payment;
use App\Services\Payments\PaymentService;
use App\Services\Tinkoff\Enums\TinkoffPaymentStatusEnum;
use App\Services\Tinkoff\Exceptions\TinkoffException;
use App\Services\Tinkoff\TinkoffConfig;
use App\Services\Tinkoff\TinkoffService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TinkoffController extends Controller
{
    public function __invoke(Request $request, PaymentService $paymentService): Response
    {
        $service = new TinkoffService(
            new TinkoffConfig(
                terminal: config('services.tinkoff.terminal'),
                password: config('services.tinkoff.password')
            )
        );

        try {
            $paymentEntity = $service
                ->checkCallback($request->all());

            /** @var Payment $payment */
            $payment = $paymentService
                ->getPayment($paymentEntity->id);

            match ($paymentEntity->status) {
                TinkoffPaymentStatusEnum::CONFIRMED => $paymentService
                    ->completePayment($payment),
                TinkoffPaymentStatusEnum::REJECTED,
                TinkoffPaymentStatusEnum::REVERSED,
                TinkoffPaymentStatusEnum::REFUNDED => $paymentService
                    ->cancelPayment($payment),
                default => null,
            };

        } catch (TinkoffException $e) {
            report ($e);
        }

        return response('OK', 200);
    }
}
