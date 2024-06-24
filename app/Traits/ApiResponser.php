<?php

namespace App\Traits;

use Illuminate\Http\Response;

trait ApiResponser
{
    // Method to send a success response
    public function successResponse($data, $code = Response::HTTP_OK)
    {
        return response($data, $code)->header('Content-Type', 'application/json');
    }

    // Method to send a valid response with 'data' key
    public function validResponse($data, $code = Response::HTTP_OK)
    {
        return response()->json(['data' => $data], $code);
    }

    // Method to send an error response with 'error' message and status code
    public function errorResponse($message, $code)
    {
        return response()->json(['error' => $message, 'code' => $code], $code);
    }

    // Method to send an error message response with specified status code
    public function errorMessage($message, $code)
    {
        return response($message, $code)->header('Content-Type', 'application/json');
    }
}
