<?php

namespace App\Domain\ValueObject;

use App\Domain\Enum\Priority as EnumPriority;

class Priority
{
    public function __construct(public EnumPriority $priority)
    {}

    public function getPriority(): EnumPriority { return $this->priority; }

    public function isHigherPriority(): bool {
        return $this->priority == EnumPriority::High;
    }

    public function isLowerPriority(): bool {
        return $this->priority == EnumPriority::Low;
    }

    public function isMediumPriority(): bool {
        return $this->priority == EnumPriority::Medium;
    }

    public function equals(Priority $otherPriority): bool { return $this->priority == $otherPriority->getPriority(); }
}
