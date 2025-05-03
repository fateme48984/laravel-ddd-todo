<?php

namespace App\Application\DTO\Input\ToDoList;

class CreateToDoListRequest
{
    public function __construct(
        public string $title,
        public bool $active,
    )
    {}
}
