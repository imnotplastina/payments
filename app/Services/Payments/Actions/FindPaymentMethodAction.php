<?php

namespace App\Services\Payments\Actions;

use App\Services\Payments\Models\PaymentMethod;
use Illuminate\Database\Eloquent\Builder;

final class FindPaymentMethodAction
{
    public function __construct(
        private readonly string $methodId,
    ) {
    }

    public function handle(): PaymentMethod|Builder
    {
        return PaymentMethod::query()
            ->where('active', true)
            ->findOrFail($this->methodId);
    }
}
