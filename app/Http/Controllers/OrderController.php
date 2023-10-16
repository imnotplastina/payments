<?php

namespace App\Http\Controllers;

use App\Services\Orders\Models\Order;
use App\Services\Payments\Enums\PaymentStatusEnum;
use App\Services\Payments\Models\Payment;
use App\Services\Payments\PaymentService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function index(): View
    {
        $orders = Order::query()->get();

        return view('orders.index', compact('orders'));
    }

    public function show(Order $order): View
    {
        return view('orders.show', compact('order'));
    }

    public function payment(Order $order, PaymentService $service): RedirectResponse
    {
        $payment = $service
            ->createPayment($order)
            ->handle();

        return to_route('payments.checkout', $payment->uuid);
    }
}
