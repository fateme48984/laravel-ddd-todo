<?php

namespace App\Domain\Exception\Task;

use App\Domain\Exception\DomainException;

class InvalidAlreadyCompletedException extends DomainException
{

    public static function alreadyCompleted(): self
    {
        return new self("Task has already been completed.");
    }
}
