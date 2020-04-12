<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Mail\Auth\PasswordResetEmail;
use App\Repositories\AdminRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\JsonResponse;

class PasswordController extends Controller
{

    /**
     * AdminRepository
     *
     * @var \App\Repositories\AdminRepository;
     */ 
    private $admin_r;


    public function __construct(AdminRepository $adminRepository) {
        $this->admin_r = $adminRepository;
    }
    

    /**
     * SendResetLink for email
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function sendResetLink(Request $request) : JsonResponse
    {
        $email  = $request->get("email");

        $admin = $this->admin_r->findByEmail($email);

        if (!$admin) {
            return $this->jsonErrorsResponse("admin_not_found");
        }

        
        $token = md5(uniqid());
        DB::table("password_resets")->where("email", $email)->delete();
        DB::table("password_resets")->insert([
            ["email" => $admin->email, "token" => $token, "created_at" => Carbon::now()]
        ]);

        $url = env("APP_URL") . "/password_recovery/?" . $token;
        Mail::to($admin->email)->queue(new PasswordResetEmail($admin->first_name, $url));

        $data = [];
        if (config("app.debug")) {
            $data['password_reset_token'] = $token;
        }

        return $this->jsonResponse($data, Response::HTTP_OK);
    }


    public function changePassword(Request $request) // : JsonResponse
    {
        $resetPassword = DB::table("password_resets")->where("token", $request->token)->first();

        if (!$resetPassword) {
            return $this->jsonErrorsResponse("token_incorrect");
        }

        $admin = $this->admin_r->findByEmail($resetPassword->email);

        if (!$admin) {
            return $this->jsonErrorsResponse("admin_not_exist");
        }

        if ($this->validator($request->all())->fails()) {
            return $this->jsonErrorsResponse("validation_failed");
        };

        $admin->password = Hash::make($request->password);
        $admin->push();

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
