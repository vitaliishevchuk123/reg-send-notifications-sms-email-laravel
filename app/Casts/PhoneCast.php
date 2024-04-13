<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

class PhoneCast implements CastsAttributes
{
    public function get(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        return '+'. $value;
    }

    public function set(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        return preg_replace('/\D/', '', $value);
    }
}
