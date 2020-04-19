<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Repositories\AdminRepository;
use App\Repositories\UserRepository;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Str;
use Symfony\Component\HttpFoundation\JsonResponse;

class RegisterUserController extends Controller
{

    private $user_r;

    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    // use RegistersUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->user_r = $userRepository;
        $this->middleware('guest');
    }

    public function register(Request $request) : JsonResponse
    {

        // dd($request->all());

        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            return $this->jsonErrorsResponse($validator->errors(), Response::HTTP_BAD_REQUEST);
        }

        $this->create($request->all());

        return $this->jsonResponse(null, Response::HTTP_ACCEPTED, "user_successful_registered");
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name'    => ['required', 'string', 'max:255'],
            'last_name'     => ['required', 'string', 'max:255'],
            'email'         => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password'      => ['required', 'string', 'min:6', 'confirmed'],
            'phone'         => ['required', 'string'],
            'fax'           => ['nullable', 'string'],
            // "country_id"    => ['required', 'integer', 'exists:countries,id']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return $this->user_r->create([
            'login'         => Str::before($data["email"], "@"),
            'first_name'    => $data['first_name'],
            'last_name'     => $data['last_name'],
            'email'         => $data['email'],
            'password'      => Hash::make($data['password']),
            'phone'         => $data['phone'],
            'fax'           => $data['fax'],
            'role_id'       => 2,
            // 'country_id'    => $data['country_id'],
        ]);
    }
}
