<?php

namespace App\Services\Orders;

use App\Services\Orders\Actions\CompleteOrderAction;
use App\Services\Orders\Models\Order;

class OrderService
{
    public function completeOrder(Order $order): CompleteOrderAction
    {
        return new CompleteOrderAction($order);
    }
}
