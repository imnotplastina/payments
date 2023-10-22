<?php

namespace App\Services\Payments\Actions;

use App\Services\Payments\Contracts\Payable;
use App\Services\Payments\Enums\PaymentStatusEnum;
use App\Services\Payments\Models\Payment;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Str;

final class CreatePaymentAction
{
    public function __construct(
        private readonly Payable $payable
    ) {
    }

    public function handle(): Payment|Builder
    {
        return Payment::query()->create([
                'uuid' => (string) Str::uuid(),
                'status' => PaymentStatusEnum::Pending,
                'currency_id' => $this->payable->getPayableCurrencyId(),
                'amount' => $this->payable->getPayableAmount(),
                'payable_type' => $this->payable->getPayableType(),
                'payable_id' => $this->payable->getPayableId(),
                'method_id' => null,
                'driver' => null,
            ]);
    }
}
