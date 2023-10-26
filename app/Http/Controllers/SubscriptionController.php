<?php

namespace App\Http\Controllers;

use App\Services\Payments\PaymentService;
use App\Services\Subscriptions\Enums\SubscriptionStatusEnum;
use App\Services\Subscriptions\Models\Subscription;
use App\Supports\AmountValue;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;

class SubscriptionController extends Controller
{
    public function index(): View
    {
         $subscriptions = Subscription::query()
            ->latest()
            ->get();

        return view('subscriptions.index', compact('subscriptions'));
    }

    public function show(Subscription $subscription): View
    {
        return view('subscriptions.show', compact('subscription'));
    }

    public function store(PaymentService $service): RedirectResponse
    {
        /** @var Subscription $subscription */
        $subscription = Subscription::query()
            ->create([
                'uuid' => Str::uuid(),
                'currency_id' => 'RUB',
                'price' => new AmountValue(rand(100, 1000)),
                'status' => SubscriptionStatusEnum::Pending,
            ]);

        $payment = $service
            ->createPayment($subscription)
            ->handle();

        return to_route('payments.checkout', $payment->uuid);
    }

    public function payment(Subscription $subscription, PaymentService $service): RedirectResponse
    {
        $payment = $service
            ->createPayment($subscription)
            ->handle();

        return to_route('payments.checkout', $payment->uuid);
    }
}
