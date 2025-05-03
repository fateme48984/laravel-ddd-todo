<?php

namespace App\Domain\Exception\Validation;

class InvalidDateException extends InvalidException
{
    public static function dueDateInPast(): self
    {
        return new self("Due date must be in the future.");
    }
}

