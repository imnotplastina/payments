<?php

namespace App\Services\Payments\Enums;

enum PaymentStatusEnum: string
{
    case Pending = 'pending';
    case Completed = 'completed';
    case Cancelled = 'cancelled';

    public function name(): string
    {
        return match ($this) {
            self::Pending => 'Ожидает',
            self::Completed => 'Завершено',
            self::Cancelled => 'Отменено',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::Pending => 'warning',
            self::Completed => 'success',
            self::Cancelled => 'danger',
        };
    }

    public function isPending(): bool
    {
        return $this === PaymentStatusEnum::Pending;
    }

    public function isCompleted(): bool
    {
        return $this === PaymentStatusEnum::Completed;
    }

    public function isCancelled(): bool
    {
        return $this === PaymentStatusEnum::Cancelled;
    }
}
