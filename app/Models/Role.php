<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "slug",
        "is_active",
    ];

    protected $guards = ["*"];

    /**
     * The attributes that should be visible in arrays.
     *
     * @var array
     */
    // protected $visible = ['slug'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        "created_at",
        "updated_at",
    ];


    #region Relation Ships
    public function users()
    {
        return $this->hasMany('App\Models\User', 'role_id', 'id');
    }
    #endregion
}
