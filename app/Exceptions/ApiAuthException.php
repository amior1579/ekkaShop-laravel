<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

class ApiAuthException extends Exception
{
    public function render(): JsonResponse
    {
        return response()->json([
            'error' => 'Unauthorized',
            'message' => $this->getMessage(),
        ], 401);
    }
}
