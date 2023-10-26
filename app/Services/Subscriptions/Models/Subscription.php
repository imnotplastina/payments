<?php

namespace App\Services\Subscriptions\Models;

use App\Services\Payments\Contracts\Payable;
use App\Services\Subscriptions\Enums\SubscriptionStatusEnum;
use App\Services\Subscriptions\SubscriptionService;
use App\Supports\AmountValue;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property string uuid
 * @property string currency_id
 * @property AmountValue price
 * @property SubscriptionStatusEnum status
 */
class Subscription extends Model implements Payable
{
    protected $fillable = [
        'uuid',
        'currency_id', 'price',
        'status'
    ];

    protected $casts = [
        'price' => AmountValue::class,
        'status' => SubscriptionStatusEnum::class,
    ];

    public function getPayableName(): string
    {
        return 'Подписка';
    }

    public function getPayableUrl(): string
    {
        return route('subscriptions.show', $this);
    }

    public function getPayableCurrencyId(): string
    {
        return $this->currency_id;
    }

    public function getPayableAmount(): AmountValue
    {
        return $this->price;
    }

    public function getPayableType(): string
    {
        return $this->getMorphClass();
    }

    public function getPayableId(): int
    {
        return $this->id;
    }

    public function onPaymentComplete(): void
    {
        (new SubscriptionService())
            ->completeSubscription($this)
            ->handle();
    }
}
