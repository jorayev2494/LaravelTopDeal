<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

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

    protected $with = [
        "trans",
        // "childs",
        // "parents",
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    #region Relationships

    /**
     * Get Categories
     *
     * @return HasMany
     */
    public function categories() : HasMany
    {
        return $this->hasMany(self::class, 'parent_id', 'id');
    }

    /**
     * Get Childs
     *
     * @return HasMany
     */
    public function childs() : HasMany
    {
        return $this->hasMany(self::class, 'parent_id', 'id')->with('childs');
    }

    /**
     * Get Parents
     *
     * @return BelongsTo
     */
    public function parents() : BelongsTo
    {
        return $this->belongsTo(self::class, 'parent_id', 'id')->with('parents');
    }

    /**
     * Get Trans Category
     *
     * @return HasOne
     */
    public function trans() : HasOne
    {
        return $this->hasOne(TranslateCategory::class, 'category_id', 'id');
    }
    #endregion


    /**
     * Has Children
     *
     * @return boolean
     */
    public function hasChildren() : bool
    {
        return $this->childs()->count();
    }

    /**
     * HasParent
     *
     * @return boolean
     */
    public function hasParent() : bool
    {
        return $this->parents()->count();
    }
}
