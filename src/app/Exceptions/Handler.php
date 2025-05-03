<?php

namespace App\Exceptions;

use App\Domain\Exception\DomainException;
use App\Domain\Exception\DomainExceptionHandler;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->renderable(function (DomainException $e) {
            return DomainExceptionHandler::handle($e);
        });

        $this->renderable(function (Throwable $e) {
           return  response()->json([
               'error' => 'Validation failed',
               'message' => $e->getMessage(),
               //'errors' => $e->errors(),
           ],422);
        });
    }
}
