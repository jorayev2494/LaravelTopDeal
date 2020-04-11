<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Repositories\AdminRepository;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Str;
use Symfony\Component\HttpFoundation\JsonResponse;

class RegisterController extends Controller
{

    private $admin_r;

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
    public function __construct(AdminRepository $adminRepository)
    {
        $this->admin_r = $adminRepository;
        $this->middleware('guest');
    }

    public function register(Request $request) : JsonResponse
    {
        $this->validator($request->all());
        $this->create($request->all());
        return $this->jsonResponse(null, Response::HTTP_CREATED, "admin_successful_registered");
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        Validator::make($data, [
            'email'         => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password'      => ['required', 'string', 'min:6', 'confirmed'],
            "country_id"    => ['required', 'integer', 'exists:countries,id']
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
        $login  = Str::before($data["email"], "@");
        return $this->admin_r->create([
            'login'         => $login,
            'email'         => $data['email'],
            'password'      => Hash::make($data['password']),
            'country_id'    => $data['country_id'],
        ]);
    }
}
