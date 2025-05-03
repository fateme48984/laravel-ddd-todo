<?php

namespace App\Providers;

use App\Domain\Repository\TaskRepository;
use App\Domain\Repository\ToDoListRepository;
use Illuminate\Support\ServiceProvider;
use App\Infrastructure\Repository\TaskRepository as TaskEloquentRepository;
use App\Infrastructure\Repository\ToDoListRepository as ToDoListEloquentRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(TaskRepository::class, TaskEloquentRepository::class);
        $this->app->bind(ToDoListRepository::class, ToDoListEloquentRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
