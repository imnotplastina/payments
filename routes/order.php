<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;


Route::get('orders', [OrderController::class, 'index'])
    ->name('orders');

Route::get('orders/{order:uuid}', [OrderController::class, 'show'])
    ->name('orders.show');

Route::post('orders/{order:uuid}/payment', [OrderController::class, 'payment'])
    ->name('orders.payment');
