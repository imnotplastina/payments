<?php

namespace App\Services\Currencies\Enums;

enum SourceEnum: string
{
    case Manual = 'Manual';
    case CBRF = 'CBRF';
}
