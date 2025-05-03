<?php

namespace App\Http\Controllers;

use App\Application\DTO\Input\Task\CreateTaskRequest;
use App\Application\UseCase\Task\CreateTask;
use App\Application\UseCase\Task\UpdateTask;
use App\Domain\Exception\Validation\InvalidStringException;
use App\Domain\ValueObject\Priority;
use App\Domain\ValueObject\Status;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use DateTime;
use Illuminate\Http\JsonResponse;

class TaskController extends Controller
{
    public function __construct(
        private CreateTask $createTaskUseCase,
        private UpdateTask $updateTaskUseCase
    )
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$tasks = $this->
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * @throws InvalidStringException
     */
    public function store(StoreTaskRequest $request): JsonResponse
    {
        $dto = new CreateTaskRequest(
            listId: $request->get('list_id'),
            title: $request->input('title'),
            status: new Status(\App\Domain\Enum\Status::from($request->input('status'))),
            priority: new Priority(\App\Domain\Enum\Priority::from($request->input('priority'))) ,
            description: $request->input('description'),
            dueDate: $request->input('due_date') ? new DateTime($request->input('due_date')) : null,
        );

        $task = $this->createTaskUseCase->execute($dto);

        return response()->json(
            ['message' => 'task created.','id'=>$task->getId()]
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        $dto = new \App\Application\DTO\Input\Task\UpdateTaskRequest(
            id: $task->id,
            listId: $request->get('list_id'),
            title: $request->get('title'),
            status: new Status(\App\Domain\Enum\Status::from($request->input('status'))),
            priority: new Priority(\App\Domain\Enum\Priority::from($request->input('priority'))) ,
            dueDate: $request->get('due_date') ? new DateTime($request->input('due_date')) : null,
            description: $request->get('description'),
        );

        $this->updateTaskUseCase->execute($dto);

        return response()->json(
            ['message' => 'task updated.','id'=>$task->id]
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
    }
}
