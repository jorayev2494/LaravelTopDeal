<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CountryController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $countries = Country::where("is_active", true)->select(["id", "slug"])->get();
        return $this->jsonResponse($countries, Response::HTTP_OK);
    }
}
