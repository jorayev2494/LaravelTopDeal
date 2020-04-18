<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Repositories\AdminRepository;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\JsonResponse;
use Tymon\JWTAuth\Exceptions\JWTException;

class LoginController extends Controller
{

    private $admin_r;

    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    // use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AdminRepository $adminRepository)
    {
        $this->admin_r = $adminRepository;
        $this->middleware('guest')->except('logout');
    }

    /**
     * Login with get token
     *
     * @param Request $request
     * @return void
     */
    public function login(Request $request) : JsonResponse
    {
        $this->validateLogin($request);

        // $admin = $this->admin_r->whereEmail($this->username($request), $request->get($this->username($request)))->first();
        $admin = $this->admin_r->whereEmail($request->get($this->username($request)))->first();


        // dd($admin);

        // if (!$admin || !Hash::check($request->password, $admin->password)) {
            // return response()->json(['error' => 'The provided credentials are incorrect.'], 200);
        // }

        $credentials = request(['email', 'password']);
        if (! $token = auth()->guard("admin")->attempt($credentials)) {
            return $this->jsonErrorsResponse("email_ro_password_invalid", Response::HTTP_ACCEPTED);
        }

        return $this->jsonResponse($this->generateAuthToken($token, $admin), Response::HTTP_OK);
    }

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username($request) => 'required|string',
            'password' => 'required|string',
        ]);
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username(Request $request) : string
    {
        return $request->has('email') ? 'email' : 'login';
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->jsonResponse($this->generateAuthToken(auth()->guard("admin")->refresh()), Response::HTTP_OK);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        try {
            auth()->guard("admin")->logout();
        } catch (JWTException $ex) {
            return $this->jsonResponse(null, Response::HTTP_OK, 'successfully_logged');
        }

        return $this->jsonResponse(null, Response::HTTP_OK, 'successfully_logged');
    }
}
