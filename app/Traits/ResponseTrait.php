<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

trait ResponseTrait
{
    public function successResponse($data, $statusCode = Response::HTTP_OK)
    {
        return new JsonResponse(['status' => 'ok', 'data' => $data], $statusCode);
    }

    public function emptyResponse()
    {
        return new JsonResponse([], Response::HTTP_NO_CONTENT);
    }

    public function errorResponse($data, $statusCode = Response::HTTP_INTERNAL_SERVER_ERROR)
    {
        return new JsonResponse(['status'=>'error', 'messages'=>$data], $statusCode);
    }
}
