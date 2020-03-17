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

    /**
     * Browser Api
     *
     * @param [type] $data
     * @param integer $status
     * @param string $message
     * @return void
     */
    public function response($data, int $status = 200, string $message = null)
    {
        
        $response = $data;
        
        if ($message) {
            $response = ["data" => $data];
            $response =  array_merge($response, ["message" => $message]);
        }
        
        $message = $message == null && $status == 200 ? "success" : $message;

        return response()->json($response, $status);
    }

}
