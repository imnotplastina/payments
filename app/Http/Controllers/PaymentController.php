<?php

namespace App\Http\Controllers;

use App\Http\Requests\Payment\UpdatePaymentRequest;
use App\Services\Payments\Enums\PaymentStatusEnum;
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

    public function process(Payment $payment): View
    {
        return view("payments.driver.{$payment->driver->value}",
            compact('payment')
        );
    }

    public function complete(Payment $payment): RedirectResponse
    {
        $payment->status = PaymentStatusEnum::Completed;
        $payment->save();

        return redirect()->route('payments.success', [
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
