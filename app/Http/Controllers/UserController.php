<?php

namespace App\Http\Controllers;

use App\Http\Requests\Cabinet\PersonalUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\JsonResponse;

class UserController extends Controller
{
    /**
     * User
     *
     * @var \App\Models\User
     */
    private $authUser;

    public function __construct() {
        $this->authUser = auth()->user();
    }

    public function me()
    {
        return $this->jsonResponse($this->authUser, Response::HTTP_OK);
    }

    public function personalUpdate(PersonalUpdateRequest $request) : JsonResponse
    {
        $this->authUser->update(array_merge($request->all(), [
            "country_id" => $request->country["id"],
        ]));
            
        return $this->jsonResponse($this->authUser->setHidden(array_merge($this->authUser->getHidden(), ["social_links"])), Response::HTTP_OK, 'personal_data_updated');
    }

    public function passwordChange(Request $request) : JsonResponse
    {
        if (Hash::check($request->old_password, $this->authUser->password)) {
            $this->authUser->password = Hash::make($request->password);
            $this->authUser->save();

            return $this->jsonResponse(null, Response::HTTP_ACCEPTED, "password_changed_successful");
        }

        return $this->jsonErrorsResponse("old_password_incorrect", Response::HTTP_BAD_REQUEST, "old_password_incorrect");
    }
}
