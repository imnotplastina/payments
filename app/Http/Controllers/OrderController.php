<?php

namespace App\Http\Controllers;

use App\Services\Orders\Models\Order;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(): View
    {
        $orders = Order::query()->get();

        return view('orders.index', compact('orders'));
    }

    public function show(Order $order): View
    {
        return view('orders.show', compact('order'));
    }
}
