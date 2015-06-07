<?php

namespace Keyding;

class ValidateTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var array with testcases =)
     */
    private $cases = array(
        'id' => array(
            '123'  => true,
            '1.23' => false,
            '0'    => false,
            'lol'  => false,
            '1 2'  => false,
        ),
        'num' => array(
            '123'  => true,
            '1.23' => true,
            '0'    => true,
            '123€' => false,
            '1 2'  => false,
        ),
        'time' => array(
            '05:11:33' => true,
            '16:04:22' => true,
            '5:3:44'   => true,
            '24:23:42' => false,
            '09:61:33' => false,
            '05:17:99' => false,
            '33:33:33' => false,
        ),
        'date' => array(
            '2015-06-06' => true,
            '20150606'   => true,
            '2015-33-06' => false,
            '2015-00-21' => false,
            '20150633'   => false,
            '20150600'   => false,
        )
    );

    private function processTests($test, $type = 'assertEquals')
    {
        $validate = new \Keyding\Validate;

        foreach ($this->cases[$test] as $input => $assert)
        {
            $this->$type($assert, $validate->$test($input));
        }
    }

    public function testId()
    {
        $this->processTests('id');
    }

    public function testNum()
    {
        $this->processTests('num');
    }

    public function testTime()
    {
        $this->processTests('time');
    }

    public function testDate()
    {
        $this->processTests('date');
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
