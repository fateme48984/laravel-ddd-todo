<?php

namespace App\Application\DTO\Input\ToDoList;

class UpdateToDoListRequest
{
    public function __construct(
        public readonly int $id,
        public string $title,
        public bool $active
    ){}
}
