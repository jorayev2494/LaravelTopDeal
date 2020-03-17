<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Login with get token
     *
     * @param Request $request
     * @return void
     */
    public function token(Request $request)
    {
        $this->validateLogin($request);

        $user = User::where($this->username($request), $request->get($this->username($request)))->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['error' => 'The provided credentials are incorrect.'], 200);
        }

        $response = [
            'accessToken'   => $user->createToken($request->get($this->username($request)))->plainTextToken,
            'userData'      => $user,
        ];

        return response()->json($response, 200);
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
     * Logout with remove Tokens
     *
     * @param Request $request
     * @return void
     */
    public function logout(Request $request)
    {
        $user = $request->user();
        
        // Delete User Tokens
        // $user->tokens()->delete();
        $user->tokens->each->delete();

        // dd($request->user());

        return $this->response(response()->noContent(), 204, "logouted");
    }
}
