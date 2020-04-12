<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Repositories\AdminRepository;
use App\Repositories\UserRepository;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\JsonResponse;

class LoginUserController extends Controller
{

    /**
     * UserRepository
     *
     * @var \App\Repositories\UserRepository;
     */
    private $user_r;

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
    public function __construct(UserRepository $userRepository)
    {
        $this->user_r = $userRepository;
        // $this->middleware('auth')->except('logout');
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

        // $user = $this->user_r->findByEmail($request->get($this->username($request)));

        // if (!$admin || !Hash::check($request->password, $admin->password)) {
            // return response()->json(['error' => 'The provided credentials are incorrect.'], 200);
        // }

        $credentials = request()->only(['email', 'password']);
        if (!$token = auth()->attempt($credentials)) {
            return $this->jsonErrorsResponse('the_provided_credentials_are_incorrect', 401);
        }

        return $this->jsonResponse($this->generateAuthToken($token, auth()->user()), Response::HTTP_OK);
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
        return $this->jsonResponse($this->generateAuthToken(auth()->refresh()), Response::HTTP_OK);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();
        return $this->jsonResponse(null, Response::HTTP_OK, 'user_successfully_logged_out');
    }
}
