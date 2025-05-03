<?php

namespace App\Application\UseCase\Task;

use App\Application\DTO\Input\Task\UpdateTaskRequest;
use App\Domain\Repository\TaskRepository;
use App\Domain\Service\Validator\StringLengthValidator;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UpdateTask
{
    public function __construct(
        private TaskRepository $taskRepository,
        private StringLengthValidator $stringLengthValidator,
    ){}

    public function execute(UpdateTaskRequest $request)
    {
        $task = $this->taskRepository->findById($request->id);
        if(!$task) {
            throw new NotFoundHttpException('task not found :'. $request->id);
        }
        $this->stringLengthValidator->validateMin('title', $request->title, 3);
        $this->stringLengthValidator->validateMax('title', $request->title, 255);

        $task->setTitle($request->title)
        ->setDescription($request->description)
        ->setDueDate($request->dueDate)
        ->setStatus($request->status)
        ->setPriority($request->priority)
        ->setListId($request->listId);

        $this->taskRepository->save($task);
    }
}
