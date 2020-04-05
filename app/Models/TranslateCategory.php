<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TranslateCategory extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id',
        'en',
        'ru',
    ];

    protected $guards = ['*'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
