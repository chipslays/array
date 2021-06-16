# 🧰 Array

[![Tests](https://github.com/chipslays/array/actions/workflows/tests.yml/badge.svg)](https://github.com/chipslays/array/actions/workflows/tests.yml)
![Packagist Version](https://img.shields.io/packagist/v/chipslays/array)

Simple library for array manipulate.

> Supported dot-notation and asterisks rules.

## Installation

```bash 
$ composer require chipslays/array
```

## Documentation

#### `get(array $array, $keys [, $default = null, string $separator = '.'])`

Get value from array using by dot notation key.

Has helper `arr_get()`.

```php 
use Chipslays\Arr\Arr;

$array = [
    'user' => [
        'name' => 'chipslays'
    ],
];

$name = Arr::get($array, 'user.name'); // chipslays
$email = Arr::get($array, 'user.email', 'default@email.com'); // default@email.com 
```

```php
$array = [
    'foo' => [
        'bar' => ['baz' => 1],
        'bam' => ['baz' => 2],
        'boo' => ['baz' => 3],
    ],
];

$results = arr_get($array, 'foo.*.baz');

// Array
// (
//     [0] => 1
//     [1] => 2
//     [2] => 3
// )
```

```php
$array = [
    'foo' => [
        'bar' => ['baz' => 1],
    ],
];

$results = arr_get($array, 'foo.*.baz');

// 1
```

```php
$array = [
    'foo' => [
        'bar' => ['baz' => 1],
        'bam' => ['baz' => 2],
        'boo' => ['baz' => 3],
    ],
];

$results = arr_get($array, 'foo.*');

// Array
// (
//     [0] => Array
//         (
//             [baz] => 1
//         )
//     [1] => Array
//         (
//             [baz] => 2
//         )
//     [2] => Array
//         (
//             [baz] => 3
//         )
// )
```

```php
$array = [
    'foo' => [
        'bar' => ['baz' => 1],
    ],
];

$results = arr_get($array, 'foo.*');

// Array
// (
//     [baz] => 1
// )
```

#### `set(array &$array, string $keys, $value = null [, string $separator = '.']) : void`

Set/overwrite value in array using by dot notation key.

Has helper `arr_set()`.

```php 
use Chipslays\Arr\Arr;

$array = [
    'user' => [
        'name' => 'chipslays'
    ],
];

Arr::set($array, 'user.name', 'john doe'); 
Arr::set($array, 'user.email', 'john.doe@email.com'); 

Array
(
    [user] => Array
        (
            [name] => john doe
            [email] => john.doe@email.com
        )

)
```

#### `has(array $array, $keys [, string $separator = '.']): bool`

Check exists value in array using by dot notation key.

Has helper `arr_has()`.

```php
use Chipslays\Arr\Arr;

$array = [
    'user' => [
        'name' => 'chipslays',
        'string' => '',
        'null' => null,
        'false' => false,
    ],
];

Arr::has($array, 'user.name'); // true
Arr::has($array, 'user.string'); // true
Arr::has($array, 'user.null'); // true
Arr::has($array, 'user.false'); // true
Arr::has($array, 'user.empty_value'); // false
```


#### `where(array $array, callable $callback)`

Filter the array using the given callback.

Has helper `arr_where()`.

```php
use Chipslays\Arr\Arr;

$array = [
    'user' => [
        'name' => 'chipslays',
        'string' => '',
        'null' => null,
        'false' => false,
    ],
];

// todo
```

## 👀 See also

* [`chipslays/collection`](https://github.com/chipslays/collection) - Simple library for manipulating array or object as collection.

## License 
MIT
