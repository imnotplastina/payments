<?php

use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;


Route::get('payments/{payment:uuid}/checkout', [PaymentController::class, 'checkout'])
    ->whereUuid('payment')
    ->name('payments.checkout');

Route::post('payments/{payment:uuid}/method', [PaymentController::class, 'method'])
    ->whereUuid('payment')
    ->name('payments.method');

Route::get('payments/{payment:uuid}/process', [PaymentController::class, 'process'])
    ->whereUuid('payment')
    ->middleware('payment.pending')
    ->name('payments.process');

Route::post('payments/{payment:uuid}/complete', [PaymentController::class, 'complete'])
    ->whereUuid('payment')
    ->middleware('payment.pending')
    ->name('payments.complete');

Route::post('payments/{payment:uuid}/cancel', [PaymentController::class, 'cancel'])
    ->whereUuid('payment')
    ->middleware('payment.pending')
    ->name('payments.cancel');

Route::get('payments/success', [PaymentController::class, 'success'])
    ->name('payments.success');

Route::get('payments/failure', [PaymentController::class, 'failure'])
    ->name('payments.failure');
