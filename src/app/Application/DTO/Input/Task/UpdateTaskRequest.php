<?php

namespace App\Application\DTO\Input\Task;

use App\Domain\ValueObject\Priority;
use App\Domain\ValueObject\Status;
use DateTime;

class UpdateTaskRequest
{
    public function __construct(
        public readonly int $id,
        public int $listId,
        public string $title,
        public Status $status,
        public Priority $priority,
        public ?DateTime $dueDate,
        public ?string $description,
    ){}
}
