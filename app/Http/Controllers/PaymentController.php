<?php

namespace App\Http\Controllers;

use App\Http\Requests\Payment\UpdatePaymentRequest;
use App\Services\Payments\Models\Payment;
use App\Services\Payments\Models\PaymentMethod;
use App\Services\Payments\PaymentService;
use Illuminate\Contracts\View\View;
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

    public function method(UpdatePaymentRequest $request,
                           PaymentService $service,
                           Payment $payment): RedirectResponse
    {
        $method = $service
            ->findPaymentMethod(($request->validated())['method_id'])
            ->handle();

        $payment = $service
            ->updatePaymentMethod($method, $payment)
            ->handle();

        return redirect()->route('payments.process', compact('payment'));
    }

    public function process(Payment $payment): string
    {
        return 'Выбранный способ оплаты: ' . $payment->method->name;
    }
}
