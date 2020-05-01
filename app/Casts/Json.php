<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class Json implements CastsAttributes
{
    /**
     * Cast A given value
     *
     * @param [string] $model
     * @param [string] $key
     * @param [string] $value
     * @param [arrary] $attributes
     * @return array
     */
    public function get($model, $key, $value, $attributes)
    {
        return json_decode($value, true);
    }


    /**
     * Prepare the given the value for storage
     *
     * @param [string] $model
     * @param [type] $key
     * @param [array] $value
     * @param [array] $attributes
     * @return string
     */
    public function set($model, $key, $value, $attributes)
    {
        return json_encode($value);
    }

}