<?php

namespace App\Infrastructure\Repository;

use App\Application\DTO\Filter\ToDoListFilter;
use App\Domain\Entity\ToDoList;
use App\Models\ToDoList as ToDoListModel;
class ToDoListRepository implements \App\Domain\Repository\ToDoListRepository
{

    /**
     * @inheritDoc
     */
    public function findAll(): array
    {
        return ToDoListModel::get()->toArray();
    }

    public function findById(int $id): ?ToDoList
    {
        return ToDoListModel::find($id)->toEntityDomain();
    }

    public function save(ToDoList $toDoList): void
    {
        $toDoListModel = $toDoList->getId() ?
            ToDoListModel::find($toDoList->getId()) ?? new ToDoListModel()
        :   new ToDoListModel();

        $toDoListModel->title = $toDoList->getTitle();
        $toDoListModel->active = $toDoList->isActive();
        $toDoListModel->save();

        if ($toDoList->getId() === 0 && method_exists($toDoList, 'setId')) {
            $toDoList->setId($toDoListModel->id);
        }
    }

    public function delete(ToDoList $toDoList): void
    {
        ToDoListModel::destroy($toDoList->getId());
    }

    /**
     * @inheritDoc
     */
    public function filter(ToDoListFilter $doListFilter): array
    {
        // TODO: Implement filter() method.
    }
}
