<?php

namespace App\Services\Payments\Models;

use App\Services\Payments\Enums\PaymentDriverEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property PaymentDriverEnum driver
 * @property string name
 */
class PaymentMethod extends Model
{
    protected $fillable = [
        'name', 'active', 'driver',
    ];

    protected $casts = [
        'active' => 'boolean',
        'driver' => PaymentDriverEnum::class,
    ];

}
