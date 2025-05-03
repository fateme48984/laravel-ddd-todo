<?php

namespace App\Domain\Entity;

use App\Domain\Exception\Validation\InvalidStringException;

class ToDoList
{
    const MAX_TASKS = 100;
    private array $tasks = [];
    private string $title;
    private bool  $active = true;
    public function __construct(
        private ?int $id,
        string $title,
        bool $active,
    ){
        $this->title = $title;
        $this->active = $active;
    }

    public function getId(): int
    {
        return $this->id;
    }
    public function addTask(Task $task): void {
        if($this->getTasksCount() >= self::MAX_TASKS) {
            throw new \DomainException("List is full");
        }

        if($this->hasTask($task)) {
            throw new \DomainException("Task already exists");
        }

        $this->tasks[] = $task;
    }

    public function getTasksCount(): int
    {
        return count($this->tasks);
    }

    public function removeTask(Task $task): void {
        foreach ($this->tasks as $index => $existing) {
            if ($existing->getId() === $task->getId()) {
                unset($this->tasks[$index]);
                return;
            }
        }

        throw new \DomainException("Task not found.");
    }

    private function hasTask(Task $task): bool
    {
        foreach ($this->tasks as $existing) {
            if ($existing->getId() === $task->getId()) {
                return true;
            }
        }
        return false;
    }

    public function getTasks(): array {
        return $this->tasks;
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function setId(int $id): void
    {
        if ($this->id !== 0) {
            throw new \LogicException("Cannot reset list ID");
        }

        $this->id = $id;
    }
    public function setTitle(string $title): static  {
        $title = trim($title);
        $length = strlen($title);

        if ($length < 3) InvalidStringException::tooShort('title', $title, 3);
        if ($length > 255) InvalidStringException::tooLong('title', $title, 255);

        $this->title = $title;

        return $this;
    }

    public function isActive(): bool {
        return $this->active === true;
    }

    public function setActive(bool $active): static {
        $this->active = $active;

        return $this;
    }
}
