<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait HasEnumCollection
{
    static function asCollection()
    {
        $arrays = [];

        foreach (self::asArray() as $key => $value) {
            $arrays[] = collect([
                'key' => Str::snake($key),
                'value' => $value
            ]);
        }

        return $arrays;
    }
}