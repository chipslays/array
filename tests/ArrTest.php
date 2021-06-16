<?php

use PHPUnit\Framework\TestCase;

use Chipslays\Arr\Arr;

final class ArrTest extends TestCase
{
    public function testArrGet()
    {
        $array = [
            'user' => [
                'name' => 'chipslays'
            ],
        ];

        $name = Arr::get($array, 'user.name');
        $email = Arr::get($array, 'user.email', 'default@email.com');

        $this->assertEquals('chipslays', $name);
        $this->assertEquals('default@email.com', $email);
    }

    public function testArrSet()
    {
        $array = [
            'user' => [
                'name' => 'chipslays'
            ],
        ];

        Arr::set($array, 'user.name', 'john doe');
        Arr::set($array, 'user.email', 'john.doe@email.com');

        $this->assertEquals('john doe', $array['user']['name']);
        $this->assertEquals('john.doe@email.com', $array['user']['email']);
    }

    public function testArrHas()
    {
        $array = [
            'user' => [
                'name' => 'chipslays'
            ],
        ];

        $hasName = Arr::has($array, 'user.name');
        $hasPhone = Arr::has($array, 'user.phone');

        $this->assertTrue($hasName);
        $this->assertFalse($hasPhone);
    }

    public function testArrHasEmptyValue()
    {
        $array = [
            'user' => [
                'string' => '',
                'null' => null,
                'false' => false
            ],
        ];

        $hasString = Arr::has($array, 'user.string');
        $hasNull = Arr::has($array, 'user.null');
        $hasFalse = Arr::has($array, 'user.false');
        $hasEmpty = Arr::has($array, 'user.empty');

        $this->assertTrue($hasString);
        $this->assertTrue($hasNull);
        $this->assertTrue($hasFalse);
        $this->assertFalse($hasEmpty);
    }

    public function testGetMultipleValues()
    {
        $array = [
            'foo' => [
                'bar' => ['baz' => 1],
                'bam' => ['baz' => 2],
                'boo' => ['baz' => 3],
            ],
        ];

        $result = Arr::get($array, 'foo.*.baz');

        $this->assertEquals([1,2,3], $result);
    }

    public function testGetAnyValuesAsString()
    {
        $array = [
            'foo' => [
                'bar' => ['baz' => 1],
            ],
        ];

        $result = Arr::get($array, 'foo.*.baz');

        $this->assertEquals(1, $result);
    }

    public function testGetAnyValuesEndAsterisk()
    {
        $array = [
            'foo' => [
                'bar' => ['baz' => 1],
                'bam' => ['baz' => 2],
                'boo' => ['baz' => 3],
            ],
        ];

        $result = Arr::get($array, 'foo.*');

        $this->assertEquals([
            ['baz' => 1],
            ['baz' => 2],
            ['baz' => 3],
        ], $result);
    }
}
