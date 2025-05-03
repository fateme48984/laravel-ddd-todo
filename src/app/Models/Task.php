<?php

namespace App\Models;

use App\Domain\ValueObject\Priority;
use App\Domain\Enum\Priority as PriorityEnum;
use App\Domain\ValueObject\Status;
use App\Domain\Enum\Status as StatusEnum;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Domain\Entity\Task as TaskEntity;

class Task extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'list_id', 'due_date', 'priority', 'status', 'description'];

    public function toEntityDomain() : TaskEntity{
        return new TaskEntity(
            id: $this->id,
            listId: $this->list_id,
            title: $this->title,
            priority: new Priority(PriorityEnum::from($this->priority)),
            status: new Status(StatusEnum::from($this->status)),
            dueDate: $this->due_date ? new DateTime($this->dueDate) : null,
            description: $this->description
        );
    }
}
