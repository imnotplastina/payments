<?php

namespace App\Services\Orders\Models;

use App\Services\Orders\Enums\OrderStatus;
use App\Supports\AmountValue;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'currency_id', 'amount',
        'status',
    ];

    protected $casts = [
        'status' => OrderStatus::class,
        'amount' => AmountValue::class,
    ];
}
