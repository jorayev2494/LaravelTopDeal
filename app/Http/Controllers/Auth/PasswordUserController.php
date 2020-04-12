<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\Auth\PasswordResetEmail;
use App\Repositories\UserRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\JsonResponse;

class PasswordUserController extends Controller
{

    /**
     * UserRepository
     *
     * @var \App\Repositories\UserRepository;
     */ 
    private $user_r;


    public function __construct(UserRepository $userRepository) {
        $this->user_r = $userRepository;
    }
    

    /**
     * SendResetLink for email
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function sendResetLink(Request $request) : JsonResponse
    {
        $email = $request->get("email");

        $user = $this->user_r->findByEmail($email);

        if (!$user) {
            return $this->jsonErrorsResponse("admin_not_found");
        }

        
        $token = md5(uniqid());
        DB::table("password_resets")->where("email", $email)->delete();
        DB::table("password_resets")->insert([
            ["email" => $user->email, "token" => $token, "created_at" => Carbon::now()]
        ]);

        $url = env("APP_URL") . "/password_recovery/?" . $token;
        Mail::to($user->email)->queue(new PasswordResetEmail($user->first_name, $url));

        $data = [];
        if (config("app.debug")) {
            $data['password_reset_token'] = $token;
        }

        return $this->jsonResponse($data, Response::HTTP_OK);
    }


    public function changePassword(Request $request) : JsonResponse
    {
        $resetPassword = DB::table("password_resets")->where("token", $request->token)->first();

        if (!$resetPassword) {
            return $this->jsonErrorsResponse("token_incorrect");
        }

        $user = $this->user_r->findByEmail($resetPassword->email);

        if (!$user) {
            return $this->jsonErrorsResponse("user_not_exist");
        }

        if ($this->validator($request->all())->fails()) {
            return $this->jsonErrorsResponse("validation_failed");
        };

        $user->password = Hash::make($request->password);
        $user->push();

        DB::table("password_resets")->where("token", $request->token)->delete();

        return $this->jsonResponse(null, Response::HTTP_ACCEPTED, "password_changed");
    }


    public function validator(array $data) : \Illuminate\Contracts\Validation\Validator
    {
        return Validator::make($data, [
            "password" => "required|string|confirmed|min:6"
        ]);
    }

}
