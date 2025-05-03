<?php

namespace App\Domain\Exception;

use Illuminate\Http\JsonResponse;

class DomainExceptionHandler
{
    public static function handle(DomainException $exception) : JsonResponse {
        return response()->json([
            'error' => 'Domain Exception',
            'message' => $exception->getMessage(),
            'context' => $exception->context()
        ], $exception->getCode());
    }
}
