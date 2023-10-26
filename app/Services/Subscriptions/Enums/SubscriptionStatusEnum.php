<?php

namespace App\Services\Subscriptions\Enums;

enum SubscriptionStatusEnum: string
{
    case Pending = 'pending';
    case Active = 'active';
    case Cancelled = 'cancelled';

    public function name(): string
    {
        return match ($this) {
            self::Pending => 'Ожидает',
            self::Active => 'Активна',
            self::Cancelled => 'Отменено',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::Pending => 'warning',
            self::Active => 'success',
            self::Cancelled => 'danger',
        };
    }

    public function isPending(): bool
    {
        return $this === SubscriptionStatusEnum::Pending;
    }

    public function isActive(): bool
    {
        return $this === SubscriptionStatusEnum::Active;
    }

    public function isCancelled(): bool
    {
        return $this === SubscriptionStatusEnum::Cancelled;
    }
}
