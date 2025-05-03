<?php

namespace App\Application\UseCase\ToDoList;

use App\Application\DTO\Input\ToDoList\UpdateToDoListRequest;
use App\Domain\Entity\ToDoList;
use App\Domain\Exception\Validation\InvalidStringException;
use App\Domain\Repository\ToDoListRepository;
use App\Domain\Service\Validator\StringLengthValidator;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UpdateToDoList
{
    public function __construct(
        private ToDoListRepository $toDoListRepository,
        private StringLengthValidator $stringLengthValidator,
    )
    {

    }

    /**
     * @throws InvalidStringException
     */
    public function execute(UpdateToDoListRequest $request): void
    {
        $list = $this->toDoListRepository->findById($request->id);
        if(!$list){
            throw new NotFoundHttpException('List not found');
        }

        $this->stringLengthValidator->validateMin('title', $request->title,3);
        $this->stringLengthValidator->validateMax('title', $request->title,255);

        $list->setTitle($request->title)
            ->setActive($request->active);

        $this->toDoListRepository->save($list);
    }
}
