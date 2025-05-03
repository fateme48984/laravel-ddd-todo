<?php

namespace App\Models;

use App\Domain\Entity\ToDoList as ToDoListEntity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToDoList extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'active'];

    public function toEntityDomain() : ToDoListEntity {
        return new ToDoListEntity(
            id: $this->id,
            title: $this->title,
            active: $this->active
        );
    }
}
