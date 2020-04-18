<?php

namespace App\Http\Controllers\ControllerTraits;

use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * FormatResponseTrait
 */
trait FormatResponseTrait
{
    public function jsonResponse($data, int $status = 200, string $message = "success") : JsonResponse
    {
        return response()->json(compact('status', 'data', 'message'), $status);
    }

    public function jsonErrorsResponse(string $errors, int $status = 400, string $message = "error") : JsonResponse
    {
        return response()->json(compact('status', 'errors', 'message'), $status);
    }

     /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return array
     */
    protected function generateAuthToken($token, $authData = null) : array
    {
        $response = [
            "accessToken" => $token,
            // "token_type" => "bearer",
            // "expires_in" => auth()->factory()->getTTL() * 60
        ];

        if ($authData) $response = array_merge($response, compact('authData'));

        return $response;
    }
}
