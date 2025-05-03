<?php

namespace App\Application\DTO\Filter;

use App\Domain\ValueObject\Priority;
use App\Domain\ValueObject\Status;

class TaskFilter
{
    public ?string $title = null;
    public ?\DateTime $dueDateBefore = null;
    public ?\DateTime $dueDateAfter = null;
    public ?Status $status = null;
    public ?Priority $priority = null;
    public ?int $listId = null;
}
