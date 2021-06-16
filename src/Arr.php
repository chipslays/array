<?php

namespace Chipslays\Arr;

class Arr
{
    const NOT_FOUND = 'NOT__FOUND__4MfvLvGl:htK$ZAiRoEylHo7?CgIrCDDQWrT2qUBSazEd?mpwFPq@pWRFbtjqhHJ=R8Y!w4hujyWWNwEnsZ1VmQ?';

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
        $results = self::NOT_FOUND;
        $keys = !is_array($keys) ? explode($separator, $keys) : (array) $keys;

        while (($key = array_shift($keys)) !== NULL) {
            if (array_key_exists($key, $array)) {
                $array = &$array[$key];
            } else {
                if ($key == '*') {
                    $cnt = 0;
                    foreach ($array as $value) {
                        $result = is_array($value) ? self::get($value, $keys, self::NOT_FOUND) : self::NOT_FOUND;
                        if ($result !== self::NOT_FOUND && ++$cnt == 1) {
                            $results = $result;
                        } elseif ($cnt == 2) {
                            $results = [$results, $result];
                        } else {
                            $results[] = $result;
                        }
                    }
                    if ($results !== self::NOT_FOUND) {
                        return $results;
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
     * Beware, `null`, `false` and empty string `''` will return `true`.
     *
     * @param array $array
     * @param string|array $keys
     * @param string $separator
     *
     * @return boolean
     */
    public static function has(array $array, $keys, string $separator = '.'): bool
    {
        return self::get($array, $keys, self::NOT_FOUND, $separator) !== self::NOT_FOUND ? true : false;
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
