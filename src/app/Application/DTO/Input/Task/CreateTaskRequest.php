<?php

namespace App\Application\DTO\Input\Task;

use App\Domain\ValueObject\Priority;
use App\Domain\ValueObject\Status;
use DateTime;

class CreateTaskRequest
{

    public function __construct(
        public int $listId,
        public string $title,
        public Status $status,
        public Priority $priority,
        public ?string $description,
        public ?DateTime $dueDate
    )
    {}
}
