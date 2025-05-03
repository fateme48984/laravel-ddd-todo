<?php

namespace App\Domain\Exception\Validation;

use App\Domain\Exception\DomainException;

class InvalidException extends DomainException
{
    public static function required(string $field): self
    {
        return new self("{$field} can not be empty");
    }
}
