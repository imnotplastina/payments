<?php

namespace App\Services\Currencies\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $keyType = 'int';

    public $incrementing = false;

    protected $fillable = [
        'id', 'name',
    ];
}
