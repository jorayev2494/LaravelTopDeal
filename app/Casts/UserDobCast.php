<?php


namespace App\Casts;

use Carbon\Carbon;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class UserDobCast implements CastsAttributes
{
    public function get($model, string $key, $value, array $attributes)
    {
        return Carbon::parse($value)->format("d F Y");
    }

    public function set($model, string $key, $value, array $attributes) : Carbon
    {
        return Carbon::parse($value);
    }
}
