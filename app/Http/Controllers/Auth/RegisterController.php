<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Str;

class RegisterController extends Controller
{
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

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        // $this->middleware('guest');
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
            'avatar'        => ['nullable', 'file'],
            'name'          => ['required', 'string', 'max:255'],
            'last_name'     => ['required', 'string', 'max:255'],
            'email'         => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'phone'         => ['required', 'string', 'max:255'],
            'password'      => ['required', 'string', 'min:6', 'confirmed'],
            'fax'           => ['required', 'string', 'max:255'],
            'gender'        => ['required', 'in:male,female'],
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
        $avatar = '/storage/users/avatars/ltBtNWs8SXQQBLBL9maDnHLss3w1vXDTW74z62eX.jpeg';
        $login  = Str::before($data["email"], "@");

        // Exists Avatar
        if(!array_key_exists("avatar", $data)) {
            $data = array_merge($data, [
                "avatar" => $avatar,
            ]);
        }
        
        return User::create([
            'avatar'        => $data['avatar'],
            'login'         => $login,
            'name'          => $data['name'],
            'last_name'     => $data['last_name'],
            'email'         => $data['email'],
            'phone'         => $data['phone'],
            'password'      => Hash::make($data['password']),
            'fax'           => $data['fax'],
            'gender'        => $data['gender'],
            'country_id'    => $data['country_id'],
        ]);
    }
}