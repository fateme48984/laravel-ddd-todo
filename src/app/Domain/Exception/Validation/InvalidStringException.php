<?php

namespace App\Domain\Exception\Validation;

class InvalidStringException extends InvalidException
{
    public function __construct(
        private readonly string $field,
        private readonly string $value,
        private readonly string $reason
    )
    {
        parent::__construct("Invalid string value '{$this->value}' for {$this->field}: reason: '{$this->reason}'");
    }

    public function context(): array
    {
        return [
            'field' => $this->field,
            'value' => $this->value,
            'reason' => $this->reason
        ];
    }

    public static function tooShort(string $field, string $value, int $min): self
    {
        return new self($field, $value,"{$field} is too short . Minimum is {$min} characters.");
    }

    public static function tooLong(string $field, string $value, int $max): self
    {
        return new self($field, $value,"{$field} is too long . Maximum is {$max} characters.");
    }
}
