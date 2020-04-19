<?php

namespace App\Models;

use App\Casts\JsonCast;
use App\Casts\UserDobCast;
use CarbonDateTimeCast;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Date;
use Tymon\JWTAuth\Contracts\JWTSubject;

/**
 * @property integer $id
 * @property string $avatar
 * @property string $login
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $phone
 * @property Date $dob
 * @property integer $country_id
 * @property JSON $contact_options
 * @property JSON $location
 * @property string $fax
 * @property string $password
 * @property integer $role_id
 */
class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

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
        'first_name',
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
        'avatar',
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

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }


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
