<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Traits\UserUpdateTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Users\UserAccountUpdateRequest;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class UserController extends Controller
{

    use UserUpdateTrait;

    private $user_r;

    public function __construct() {
        $this->user_r = new UserRepository();
    }
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->user_r->getAll();
        return $this->jsonResponse($users, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->user_r->findById($id);
        return $this->jsonResponse($user, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user) : JsonResponse
    {
        switch ($request->update) {
            case 'account':
                $user = $this->updateAccount($request, $user);
                return  $this->jsonResponse($user, Response::HTTP_ACCEPTED);
                break;
            case 'information':
                $user = $this->updateInformation($request, $user);
                return  $this->jsonResponse($user, Response::HTTP_ACCEPTED);
                break;
            case 'social':
                $user = $this->updateSocial($request, $user);
                return  $this->jsonResponse($user->social_links, Response::HTTP_ACCEPTED);
                break;
            default:
                return $this->jsonResponse(null, Response::HTTP_BAD_REQUEST);
                break;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteUser = User::find($id);

        if (!$deleteUser) 
            return;

        $isDeleted = $this->removeAvatar($deleteUser->avatar);

        if ($isDeleted)
            $deleteUser->delete();

        return $this->jsonResponse(response()->noContent(), Response::HTTP_NO_CONTENT, "user_successful_deleted");
    }
}
