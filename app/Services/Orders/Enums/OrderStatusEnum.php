<?php

namespace App\Services\Orders\Enums;

enum OrderStatusEnum: string
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
}
