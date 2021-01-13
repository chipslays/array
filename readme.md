# 🧰 Array

Library for array  manipulate.

## Installation

```php 
$ composer require chipslays/array
```

## Documentation

### `get(array $array, $keys [, $default = null, string $separator = '.'])`

Get value from array using by dot notation key.

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

### `set(array &$array, string $keys, $value = null [, string $separator = '.']) : void`

Set/overwrite value in array using by dot notation key.

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

### `has(array $array, $keys[, string $separator = '.']): bool`

Check exists value in array using by dot notation key.

```php
use Chipslays\Arr\Arr;

$array = [
    'user' => [
        'name' => 'chipslays'
    ],
];

Arr::has($array, 'user.name'); // true
Arr::has($array, 'user.phone'); // false
```