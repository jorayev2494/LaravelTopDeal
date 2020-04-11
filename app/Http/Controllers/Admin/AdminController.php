<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AdminController extends Controller
{
    public function me()
    {
        $auth = auth()->guard("admin")->user();
        return $this->jsonResponse($auth, Response::HTTP_OK);
    }
}
