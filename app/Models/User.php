<?php

namespace App\Models;

use App\Casts\JsonCast;
use App\Casts\UserDobCast;
use CarbonDateTimeCast;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Airlock\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    // Passwords
    public const ADMIN_PASSWORD     = 476674;
    public const DEFAULT_PASSWORD   = "laravel";

    // 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'avatar',
        'login',
        'name',
        'last_name',
        'email',
        'phone',
        'dob',
        'gender',
        'country_id',
        'contact_options',
        'location',
        'fax',
        'password',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        "country_id",
        "role_id"
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        "dob"               => UserDobCast::class,
        "created_at"        => CarbonDateTimeCast::class,
        "updated_at"        => CarbonDateTimeCast::class,
        "email_verified_at" => CarbonDateTimeCast::class,
        "contact_options"   => JsonCast::class,
        "location"          => JsonCast::class,
        "social_links"      => "array",
    ];

    protected $with = ["role", "country"];

    #region RelationShips
    // public function role()
    // {
    //     return $this->hasOne('App\Models\Role', 'id', 'role_id');
    // }


    public function role()
    {
        return $this->belongsTo('App\Models\Role', 'role_id', 'id');
    }

    public function country()
    {
        return $this->hasOne('App\Models\Country', 'id', 'country_id');
    }
    #endregion

}
