<?php

use Chipslays\Arr\Arr;

if (! function_exists('arr_get')) {
    function arr_get(array $array, $keys, $default = null, string $separator = '.')
    {
        return Arr::get($array, $keys, $default, $separator);
    }
}

if (! function_exists('arr_set')) {
    function arr_set(&$array, $keys, $value = null, $separator = '.')
    {
        Arr::set($array, $keys, $value, $separator);
    }
}

if (! function_exists('arr_has')) {
    function arr_has(array $array, $keys, string $separator = '.')
    {
        return Arr::has($array, $keys, $separator);
    }
}

if (! function_exists('arr_where')) {
    function arr_where(array $array, callable $callback)
    {
        return Arr::where($array, $callback);
    }
}

