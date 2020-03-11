<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{

    protected $guards = ["*"];

    protected $hidden = [
        "created_at",
        "updated_at",
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_active' => 'boolean',
     ];

    public function users()
    {
        return $this->hasMany('App\Models\User', 'country_id', 'id');
    }
}
