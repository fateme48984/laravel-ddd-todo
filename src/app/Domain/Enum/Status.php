<?php

namespace App\Domain\Enum;

enum Status : string
{
    case Todo = 'todo';
    case InProgress = 'in-progress';
    case Completed = 'completed';
}
