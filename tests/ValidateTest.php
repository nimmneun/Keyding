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

    public function testNum()
    {
        $this->assertEquals(true, Validate::num(123.12));
        $this->assertEquals(true, Validate::num(-123));
        $this->assertEquals(true, Validate::num('123.123'));
        $this->assertEquals(false, Validate::num('€123.00'));
    }

    public function testTime()
    {
        $validate = new \Keyding\Validate;
        $this->assertEquals(true, $validate->time('17:15:53'));
        $this->assertEquals(true, $validate->time('7:5:03'));
        $this->assertEquals(false, $validate->time('25:14:33'));
        $this->assertEquals(false, $validate->time('22:64:33'));
    }

    public function testDateformat()
    {
        $validate = new \Keyding\Validate;
        $this->assertEquals(true, $validate->dateformat('2015-06-06'));
        $this->assertEquals(false, $validate->dateformat('06-06-2015'));
    }

    public function testTimestamp()
    {
        $validate = new \Keyding\Validate;
        $this->assertEquals(true, $validate->timestamp('2015-05-06 17:15:53'));
        $this->assertEquals(false, $validate->timestamp('15-06-06 07:05:03'));
    }

    public function testNullableId()
    {
        $validate = new \Keyding\Validate;
        $this->assertEquals(true, $validate->nullableId(123));
        $this->assertEquals(true, $validate->nullableId(null));
        $this->assertEquals(false, $validate->nullableId(0));
        $this->assertEquals(false, $validate->nullableId(-123));
    }

    public function testNullableValue()
    {
        $this->assertEquals(true, Validate::nullableValue(123));
        $this->assertEquals(true, Validate::nullableValue('1231'));
        $this->assertEquals(true, Validate::nullableValue(null));
        $this->assertEquals(false, Validate::nullableValue(''));
        $this->assertEquals(false, Validate::nullableValue(' '));
    }
}
