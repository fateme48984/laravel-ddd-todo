<?php

namespace App\Application\UseCase\Task;

use App\Application\DTO\Input\Task\CreateTaskRequest;
use App\Domain\Entity\Task as TaskEntity;
use App\Domain\Exception\Validation\InvalidStringException;
use App\Domain\Repository\TaskRepository;
use App\Domain\Service\Validator\StringLengthValidator;

class CreateTask
{
    public function __construct(
        private TaskRepository $taskRepository,
        private StringLengthValidator $validator
    )
    {}

    /**
     * @throws InvalidStringException
     */
    public function execute(CreateTaskRequest $request)
    {
        $this->validator->validateMin('title', $request->title, 3);
        $this->validator->validateMax('title', $request->title, 255);
        if($request->description) {
            $this->validator->validateMin('description', $request->description, 3);
            $this->validator->validateMax('description', $request->description, 5000);
        }

        $task = new TaskEntity(
          id: 0,
          listId: $request->listId,
          title: $request->title,
          priority: $request->priority,
          status: $request->status,
          dueDate: $request->dueDate,
          description: $request->description
        );

        $this->taskRepository->save($task);

        return $task;
    }
}
