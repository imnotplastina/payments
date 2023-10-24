<?php

namespace App\Http\Controllers;

use App\Http\Requests\Payment\UpdatePaymentRequest;
use App\Services\Payments\Models\Payment;
use App\Services\Payments\Models\PaymentMethod;
use App\Services\Payments\PaymentService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;


class PaymentController extends Controller
{
    public function checkout(Payment $payment): View
    {
        $methods = PaymentMethod::query()
            ->where('active', true)
            ->get();

        return view('payments.checkout', compact('payment', 'methods'));
    }

    public function method(
        UpdatePaymentRequest $request,
        PaymentService $service,
        Payment $payment
    ): RedirectResponse {
        $method = $service
            ->findPaymentMethod(($request->validated())['method_id'])
            ->handle();

        $payment = $service
            ->updatePaymentMethod($method, $payment)
            ->handle();

        return redirect()->route('payments.process', compact('payment'));
    }

    public function process(Payment $payment, PaymentService $service): View
    {
        $driver = $service
            ->getDriver($payment->driver);

        return $driver->view($payment);
    }

    public function complete(Payment $payment, PaymentService $service): RedirectResponse
    {
        $payment = $service
            ->completePayment($payment)
            ->handle();

        return redirect()->route('payments.success', [
            'uuid' => $payment->uuid,
        ]);
    }

    public function cancel(Payment $payment, PaymentService $service): RedirectResponse
    {
        $payment = $service
            ->cancelPayment($payment)
            ->handle();

        return redirect()->route('payments.failure', [
            'uuid' => $payment->uuid,
        ]);
    }

    public function success(Request $request): View
    {
        $uuid = $request->input('uuid');

        $payment = Payment::query()
            ->where(compact('uuid'))
            ->firstOrFail();

        return view('payments.success', compact('payment'));
    }

    public function failure()
    {

    }
}
