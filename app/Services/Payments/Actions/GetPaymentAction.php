<?php

namespace App\Services\Payments\Actions;

use App\Services\Payments\Models\Payment;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

final class GetPaymentAction
{
    public function __construct(
        private readonly string $uuid,
    ) {
    }

    public function handle(): Builder|Model
    {
        return Payment::query()
            ->where('uuid', $this->uuid)
            ->firstOrFail();
    }
}
