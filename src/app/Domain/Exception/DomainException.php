<?php

namespace App\Domain\Exception;

abstract class DomainException extends \Exception
{
    public function context(): array {
        return [];
    }

    public function statusCode(): int {
        return 422;
    }
}
