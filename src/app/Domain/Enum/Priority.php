<?php

namespace App\Domain\Enum;

enum Priority: string
{
    case High = 'high';
    case Medium = 'medium';
    case Low = 'low';
}
