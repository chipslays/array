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
}
