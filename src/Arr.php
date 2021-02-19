<?php

namespace Chipslays\Arr;

class Arr
{
    /**
     * Get value from array using by dot notation key.
     * 
     * @param array $array
     * @param string|array $keys
     * @param mixed $default
     * @param string $separator
     * 
     * @return mixed
     */
    public static function get(array $array, $keys, $default = null, string $separator = '.')
    {
        $thisDefault = 'NOT__FOUND__4MfvLvGl:htK$ZAiRoEylHo7?CgIrCDDQWrT2qUBSazEd?mpwFPq@pWRFbtjqhHJ=R8Y!w4hujyWWNwEnsZ1VmQ?';

        $keys = !is_array($keys) ? explode($separator, $keys) : (array) $keys;

        while (($key = array_shift($keys)) !== NULL) {
            if (array_key_exists($key, $array)) {
                $array = &$array[$key];
            } else {
                if ($key == '*') {
                    foreach ($array as $value) {
                        $result = is_array($value) ? static::get($value, $keys, $thisDefault) : $thisDefault;
                        if ($result !== $thisDefault) {
                            return $result;
                        }
                    }
                } else {
                    return $default;
                }
            }
        }

        return $array;
    }

    /**
     * Set/overwrite value in array using by dot notation key.
     * 
     * @param array $array
     * @param string $keys
     * @param mixed $value
     * @param string $separator
     * 
     * @return void
     */
    public static function set(array &$array, string $keys, $value = null, string $separator = '.'): void
    {
        $keys = explode($separator, $keys);

        foreach ($keys as $key) {
            $array = &$array[$key];
        }

        $array = $value;
    }

    /**
     * Check exists value in array using by dot notation key.
     * 
     * @param array $array
     * @param string|array $keys
     * @param string $separator
     * 
     * @return boolean
     */
    public static function has(array $array, $keys, string $separator = '.'): bool
    {
        return self::get($array, $keys, false, $separator) ? true : false;
    }

    /**
     * Filter the array using the given callback.
     *
     * @param  array  $array
     * @param  callable  $callback
     * @return array
     */
    public static function where(array $array, callable $callback)
    {
        return array_filter($array, $callback, ARRAY_FILTER_USE_BOTH);
    }
}
