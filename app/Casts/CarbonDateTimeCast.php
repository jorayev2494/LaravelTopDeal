<?php

use Carbon\Carbon;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class CarbonDateTimeCast implements CastsAttributes
{
    public function get($model, string $key, $value, array $attributes)
    {
        dd($value);
        return Carbon::parse($value)->format("d M Y");
    }

    public function set($model, string $key, $value, array $attributes) : Carbon
    {
        return Carbon::parse($value);
    }
}