<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Admin\Traits\UserUpdateTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Users\UserAccountUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    use UserUpdateTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::all();
        
        // return [
        //     "status" => 200,
        //     "data" => User::all(),
        // ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return User::find($id) ?? new User();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        switch ($request->update) {
            case 'account':
                return $this->updateAccount($request, $user);
                break;
            case 'information':
                return $this->updateInformation($request, $user);
                break;
            case 'social':
                return $this->updateSocial($request, $user)->social_links;
                break;
            default:
                return;
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

        return [
            "status" => 200,
            "data" => null,
            "message" => "success"
        ];
    }
}
