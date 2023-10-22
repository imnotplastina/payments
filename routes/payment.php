<?php

use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;


Route::get('payments/{payment:uuid}/checkout', [PaymentController::class, 'checkout'])
    ->name('payments.checkout');

Route::post('payments/{payment:uuid}/method', [PaymentController::class, 'method'])
    ->name('payments.method');

Route::get('payments/{payment:uuid}/process', [PaymentController::class, 'process'])
    ->middleware('payment.pending')
    ->name('payments.process');

Route::post('payments/{payment:uuid}/complete', [PaymentController::class, 'complete'])
    ->middleware('payment.pending')
    ->name('payments.complete');

Route::get('payments/success', [PaymentController::class, 'success'])
    ->name('payments.success');
