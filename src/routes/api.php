<?php

use App\Http\Controllers\ToDoListController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


    Route::get('/tasks', [TaskController::class, 'index']);
    Route::post('/tasks', [TaskController::class, 'store']);
    Route::put('/tasks/{task}/edit', [TaskController::class, 'update']);
    Route::delete('/tasks/{task}', [TaskController::class, 'destroy']);
    Route::get('/tasks/{task}', [TaskController::class, 'show']);
    Route::post('/tasks/{task}/complete', [TaskController::class, 'completeTask']);

    Route::get('/lists', [ToDoListController::class, 'index']);
    Route::post('/lists', [ToDoListController::class, 'store']);
    Route::post('/lists/{toDoList}/addTask',[ToDoListController::class,'addTask']);
    Route::put('/lists/{toDoList}/edit', [ToDoListController::class, 'update']);
    Route::delete('/lists/{task}', [TaskController::class, 'destroy']);

