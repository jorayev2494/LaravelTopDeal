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

     /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return array
     */
    protected function generateAuthToken($token, $auth_data = null) : array
    {
        $response = [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ];

        if ($auth_data) $response = array_merge($response, compact('auth_data'));

        return $response;
    }
}
