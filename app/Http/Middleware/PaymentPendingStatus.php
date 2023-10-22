<?php

namespace App\Http\Middleware;

use App\Services\Payments\Models\Payment;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PaymentPendingStatus
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $payment = $request->route('payment');

        abort_unless($payment->status->isPending(), 404);

        return $next($request);
    }
}
