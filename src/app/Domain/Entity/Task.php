<?php

namespace App\Domain\Entity;

use App\Domain\Exception\Task\InvalidAlreadyCompletedException;
use App\Domain\Exception\Validation\InvalidDateException;
use App\Domain\ValueObject\Status;
use App\Domain\ValueObject\Priority;
use DateTime;

class Task
{
    private string $title;
    private Priority $priority;
    private Status $status;
    public function __construct(
        private ?int $id,
        private int $listId,
        string $title,
        Priority $priority,
        Status $status,
        private ?DateTime $dueDate = null,
        private ?string $description = null,
    ) {
        $this->title = $title;
        $this->priority = $priority;
        $this->status = $status;
    }


    public function getId(): ?int
    {
        return $this->id;
    }
    public function getListId(): int
    {
        return $this->listId;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getPriority(): Priority
    {
        return $this->priority;
    }

    public function getStatus(): Status
    {
        return $this->status;
    }

    public function getDueDate(): ?DateTime
    {
        return $this->dueDate;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setId(int $id): void
    {
        if ($this->id !== 0) {
            throw new \LogicException("Cannot reset task ID");
        }

        $this->id = $id;
    }

    public function setDueDate(?DateTime $dueDate): static
    {
        $now = new \DateTime();
        if ($dueDate < $now) InvalidDateException::dueDateInPast();
        $this->dueDate = $dueDate;

        return $this;
    }

    public function setListId(int $listId): static
    {
        $this->listId = $listId;

        return $this;
    }
    public function setTitle(string $title): static
    {
        $title = trim($title);
        $this->title = $title;

        return $this;
    }

    public function setDescription(?string $description): static
    {
        $description = trim($description);
        $this->description = $description;

        return $this;
    }
    public function setPriority(Priority $priority): static
    {
        $this->priority = $priority;

        return $this;
    }

    public function setStatus(Status $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function markAsCompleted(): static {
        if ($this->isComplete()) InvalidAlreadyCompletedException::alreadyCompleted();
        $this->setStatus(new Status(\App\Domain\Enum\Status::Completed));

        return $this;
    }

    public function isComplete(): bool
    {
        return $this->status->isCompleted();
    }

    public function reschedule(DateTime $dueDate): static {
        return $this->setDueDate($dueDate);
    }
}
