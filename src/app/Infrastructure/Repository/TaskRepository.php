<?php

namespace App\Infrastructure\Repository;

use App\Application\DTO\Filter\TaskFilter;
use App\Domain\Entity\Task;
use App\Models\Task as TaskModel;
class TaskRepository implements \App\Domain\Repository\TaskRepository
{

    /**
     * @inheritDoc
     */
    public function findByListId(int $listId): array
    {
        return TaskModel::where("list_id", $listId)
            ->get()
            ->map(fn ($task) => $task->toEntityDomain())
            ->toArray();
    }

    public function findById(int $id): ?Task
    {
        $task = TaskModel::find($id);
        return $task->toEntityDomain();
    }

    public function save(Task $task): void
    {
        $taskModel = $task->getId()
        ? TaskModel::find($task->getId()) ?? new TaskModel()
        : new TaskModel();

        $taskModel->list_id = $task->getListId();
        $taskModel->title = $task->getTitle();
        $taskModel->status = $task->getStatus()->getStatus()->value;
        $taskModel->priority = $task->getPriority()->getPriority()->value;
        $taskModel->due_date = $task->getDueDate();
        $taskModel->description = $task->getDescription();

        $taskModel->save();

        if ($task->getId() === 0 && method_exists($task, 'setId')) {
            $task->setId($taskModel->id); // you’ll need to allow setId()
        }
    }

    public function delete(Task $task): void
    {
        TaskModel::destroy($task->getId());
    }

    /**
     * @inheritDoc
     */
    public function filter(TaskFilter $filter): array
    {
        // TODO: Implement filter() method.
    }
}
