<?php


namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Response;

/**
 * Response Trait
 */
trait ResponseTrait
{
    public function response($data = null, int $status = 200, string $message = 'success')
    {
        return response()->json(compact('status', 'data', 'message'), $status);
    }

    public function responseErrors(string $errors, int $status = 301)
    {
        $response['errors'] = $errors;
        $response['status'] = $status;
        return response()->json([$response], Response::HTTP_OK);
    }
}
