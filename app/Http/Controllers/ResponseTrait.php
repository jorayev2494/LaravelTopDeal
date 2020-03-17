<?php


namespace App\Http\Controllers;


/**
 * Response Trait
 */
trait ResponseTrait
{
    private $status;
    private $data;
    private $message;


    public function responseMobile($data, int $status = 200, string $message = null)
    {
        $message = $message == null && $status == 200 ? "success" : $message;
        return response()->json(["status" => $status, "data" => $data, "message" => $message], $status);
    }


    public function response($data, int $status = 200, string $message = null)
    {
        $message = $message == null && $status == 200 ? "success" : $message;

        $response = ["data" => $data];

        if ($message)
            $response =  array_merge($response, ["message" => $message]);

        return response()->json($response, $status);
    }

}
