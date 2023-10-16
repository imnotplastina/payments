<?php

namespace App\Services\Payments\Models;

use App\Services\Payments\Enums\PaymentDriverEnum;
use App\Services\Payments\Enums\PaymentStatusEnum;
use App\Supports\AmountValue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;


class Payment extends Model
{
    protected $fillable = [
        'uuid',
        'status',
        'currency_id', 'amount',
        'payable_id', 'payable_type',
        'method_id',
        'driver',
    ];

    protected $casts = [
        'status' => PaymentStatusEnum::class,
        'amount' => AmountValue::class,
        'driver' => PaymentDriverEnum::class,
    ];

    public function payable(): MorphTo
    {
        return $this->morphTo();
    }
}
