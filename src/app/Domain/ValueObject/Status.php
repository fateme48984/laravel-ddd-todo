<?php

namespace App\Domain\ValueObject;
use App\Domain\Enum\Status as StatusEnum;

class Status
{
    public function __construct(
        public StatusEnum $status
    ){}

    public function getStatus(): StatusEnum {
        return $this->status;
    }

    public function isCompleted(): bool {
        return $this->status == StatusEnum::Completed;
    }

    public function isPending(): bool {
        return $this->status == StatusEnum::Todo;
    }

    public function isInProgress(): bool {
        return $this->status == StatusEnum::InProgress;
    }

    public function equals(Status $otherStatus): bool
    {
        return $this->status == $otherStatus->getStatus();
    }
}
