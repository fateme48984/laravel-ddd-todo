<?php

namespace App\Domain\Repository;

use App\Application\DTO\Filter\ToDoListFilter;
use App\Domain\Entity\ToDoList;

interface ToDoListRepository
{
    /** @return ToDoList[] */
    public function findAll(): array;

    public function findById(int $id) : ?ToDoList;

    public function save(ToDoList $toDoList) : void;

    public function delete(ToDoList $toDoList): void;

    /** @return ToDoList[] */
    public function filter(ToDoListFilter $doListFilter) : array;
}
