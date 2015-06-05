<?php

namespace Keyding;

class ValidateTest extends \PHPUnit_Framework_TestCase
{
    public function testId()
    {
        $validate = new \Keyding\Validate;
        $this->assertEquals(true, $validate->id(123));
        $this->assertEquals(false, $validate->id(-123));
    }

    public function testNullableId()
    {
        $validate = new \Keyding\Validate;
        $this->assertEquals(true, $validate->nullableId(123));
        $this->assertEquals(true, $validate->nullableId(null));
        $this->assertEquals(false, $validate->nullableId(0));
        $this->assertEquals(false, $validate->nullableId(-123));
    }

    public function testTime()
    {
        $validate = new \Keyding\Validate;
        $this->assertEquals(true, $validate->time('17:15:53'));
        $this->assertEquals(true, $validate->time('7:5:03'));
        $this->assertEquals(false, $validate->time('25:14:33'));
        $this->assertEquals(false, $validate->time('22:64:33'));
    }
}
