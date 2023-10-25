<?php

namespace App\Services\Orders\Actions;

use App\Services\Orders\Enums\OrderStatusEnum;
use App\Services\Orders\Models\Order;

final class CompleteOrderAction
{
    public function __construct(
        private readonly Order $order,
    ) {
    }

    public function handle(): Order
    {
      $this->order->update([
          'status' => OrderStatusEnum::Completed,
      ]);

      return $this->order;
    }
}
