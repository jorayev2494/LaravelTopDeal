<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{


    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'countries';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug',
        'is_active',
    ];

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
