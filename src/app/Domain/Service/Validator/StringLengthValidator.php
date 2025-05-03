<?php

namespace App\Domain\Service\Validator;

use App\Domain\Exception\Validation\InvalidStringException;

class StringLengthValidator
{
    public function validateMin(string $field, string $value, int $min): void
    {
        $length = strlen(trim($value));

        if ($length < $min) {
            throw InvalidStringException::tooShort($field, $value, $min);
        }
    }
        public function validateMax(string $field, string $value, int $max): void
    {
        $length = strlen(trim($value));

        if ($length > $max) {
            throw InvalidStringException::tooLong($field, $value, $max);
        }
    }
}
