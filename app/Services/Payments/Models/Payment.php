<?php

namespace App\Services\Payments\Models;

use App\Services\Orders\Models\Order;
use App\Services\Payments\Enums\PaymentDriverEnum;
use App\Services\Payments\Enums\PaymentStatusEnum;
use App\Supports\AmountValue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * @property int method_id
 * @property string uuid
 * @property PaymentMethod method
 * @property PaymentStatusEnum status
 * @property PaymentDriverEnum driver
 * @property AmountValue amount
 * @property Order payable
 * @property ?string driver_payment_id
 */
class Payment extends Model
{
    protected $fillable = [
        'uuid',
        'status',
        'currency_id', 'amount',
        'payable_id', 'payable_type',
        'method_id',
        'driver', 'driver_payment_id',
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

    public function method(): BelongsTo
    {
        return $this->belongsTo(PaymentMethod::class);
    }
}
