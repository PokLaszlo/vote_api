<?php

namespace App\Traits;

trait ApiResponse
{
    protected function success(
        mixed $data = null,string $message = 'OK',int $status = 200
    ): JsonResponse {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data'    => $data,
        ], $status);
    }

    protected function created(
        mixed $data,string $message = 'Létrehozva'
    ): JsonResponse {
        return $this->success($data, $message, 201);
    }

    protected function noContent(): JsonResponse
    {
        return response()->json(null, 204);
    }

    protected function error(
        string $message,int $status = 403
    ): JsonResponse {
        return response()->json([
            'success' => false,
            'message' => $message,
        ], $status);
    }

}
