<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "slug",
        "parent_id",
        "is_active",
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_active' => 'bool',
     ];

    protected $guards = ["*"];

    protected $with = ["childs", "parent"];

    #relation
    /**
     * Get Childs
     *
     * @return void
     */
    public function childs()
    {
        return $this->hasMany(self::class, 'id', 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id', 'id');
    }
    #endregion
}
