<?php

use App\Http\Controllers\SubscriptionController;
use Illuminate\Support\Facades\Route;

Route::get('subscriptions', [SubscriptionController::class, 'index'])
    ->name('subscriptions');

Route::get('subscriptions/{subscription:uuid}', [SubscriptionController::class, 'show'])
    ->name('subscriptions.show')
    ->whereUuid('subscription');

Route::view('subscriptions/create', 'subscriptions.create')
    ->name('subscriptions.create');

Route::post('subscriptions', [SubscriptionController::class, 'store'])
    ->name('subscriptions.store');

Route::post('subscriptions/{subscription:uuid}/payment', [SubscriptionController::class, 'payment'])
    ->name('subscriptions.payment')
    ->whereUuid('subscription');
