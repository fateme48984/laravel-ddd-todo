<?php

namespace App\Domain\Repository;

use App\Application\DTO\Filter\TaskFilter;
use App\Domain\Entity\Task;

interface TaskRepository
{
    /** @return Task[] */
    public function findByListId(int $listId): array;
    public function findById(int $id): ?Task;
    public function save(Task $task): void;
    public function delete(Task $task): void;
    /** @return Task[] */
    public function filter(TaskFilter $filter): array;
}
