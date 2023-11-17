<?php

namespace App\Services\Currencies\Models;

use App\Services\Currencies\Enums\SourceEnum;
use App\Supports\AmountValue;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $keyType = 'int';
    public $incrementing = false;

    public const RUB = 'RUB';
    public const USD = 'USD';

    protected $fillable = [
        'id', 'name',
        'price', 'source',
    ];

    protected $casts = [
        'price' => AmountValue::class,
        'source' => SourceEnum::class,
    ];
}
