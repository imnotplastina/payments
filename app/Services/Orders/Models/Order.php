<?php

namespace App\Services\Orders\Models;

use App\Services\Orders\Enums\OrderStatusEnum;
use App\Services\Orders\OrderService;
use App\Services\Payments\Contracts\Payable;
use App\Services\Payments\Models\Payment;
use App\Supports\AmountValue;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property string uuid
 * @property string currency_id
 * @property AmountValue amount
 */
class Order extends Model implements Payable
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'currency_id', 'amount',
        'status',
    ];

    protected $casts = [
        'status' => OrderStatusEnum::class,
        'amount' => AmountValue::class,
    ];

    public function getPayableName(): string
    {
        return "Заказ $this->uuid";
    }

    public function getPayableCurrencyId(): string
    {
        return $this->currency_id;
    }

    public function getPayableAmount(): AmountValue
    {
        return $this->amount;
    }

    public function getPayableType(): string
    {
        return $this->getMorphClass();
    }

    public function getPayableId(): int
    {
        return $this->id;
    }

    public function getPayableUrl(): string
    {
        return route('orders.show', $this->uuid);
    }

    public function onPaymentComplete(): void
    {
        (new OrderService)
            ->completeOrder($this)
            ->handle();
    }
}
