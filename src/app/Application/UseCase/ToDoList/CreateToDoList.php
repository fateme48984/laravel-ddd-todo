<?php

namespace App\Application\UseCase\ToDoList;

use App\Application\DTO\Input\ToDoList\CreateToDoListRequest;
use App\Domain\Entity\ToDoList;
use App\Domain\Repository\ToDoListRepository;
use App\Domain\Service\Validator\StringLengthValidator;

class CreateToDoList
{
    public function __construct(
        private ToDoListRepository $doListRepository,
        private StringLengthValidator $stringLengthValidator,
    )
    {

    }
    public function execute(CreateToDoListRequest $request): ToDoList
    {
        $this->stringLengthValidator->validateMin('title', $request->title, 3);
        $this->stringLengthValidator->validateMax('title', $request->title, 255);

        $todoList = new ToDoList(
            id: 0,
            title: $request->title,
            active: $request->active,
        );

        $this->doListRepository->save($todoList);

        return $todoList;
    }
}
