<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    public function me()
    {
        $auth = auth()->user();
        return $this->jsonResponse($auth, Response::HTTP_OK);
    }
}
