<?php


namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Psy\Util\Json;

class JsonCast implements CastsAttributes
{
    public function get($model, string $key, $value, array $attributes)
    {
        // dd(json_decode($value, true));
        return json_decode($value, true);
    }

    public function set($model, string $key, $value, array $attributes)
    {
        return json_encode($value);
    }
}
