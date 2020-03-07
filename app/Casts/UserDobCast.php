<?php


namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class UserDobCast implements CastsAttributes
{
    public function get($model, string $key, $value, array $attributes)
    {
        // return $value->format("d M Y");
    }

    public function set($model, string $key, $value, array $attributes) : Carbon
    {
        return Carbon::parse($value);
    }
}
