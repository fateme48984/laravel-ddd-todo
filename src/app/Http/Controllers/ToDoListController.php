<?php

namespace App\Http\Controllers;

use App\Application\DTO\Input\ToDoList\CreateToDoListRequest;
use App\Application\UseCase\ToDoList\CreateToDoList;
use App\Application\UseCase\ToDoList\UpdateToDoList;
use App\Http\Requests\StoreToDoListRequest;
use App\Http\Requests\UpdateToDoListRequest;
use App\Models\ToDoList;

class ToDoListController extends Controller
{
    public function __construct(
        private CreateToDoList $createToDoList,
        private UpdateToDoList $updateToDoList
    ){}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreToDoListRequest $request)
    {
        $dto = new CreateToDoListRequest(
            title: $request->title,
            active: $request->active
        );

        $toDoList = $this->createToDoList->execute($dto);

        return response()->json(
            ['message' => 'To do list created','id'=>$toDoList->getId()]
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(ToDoList $toDoList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ToDoList $toDoList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateToDoListRequest $request, ToDoList $toDoList)
    {
        $dto = new \App\Application\DTO\Input\ToDoList\UpdateToDoListRequest(
            id: $toDoList->id,
            title: $request->get('title'),
            active: $request->get('active')
        );

        $this->updateToDoList->execute($dto);

        return response()->json([
            'message' => 'To do list updated','id'=>$toDoList->id
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ToDoList $toDoList)
    {
        //
    }
}
