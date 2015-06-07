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
            '2015/06/06' => true,
            '2015/06-06' => true,
            '2015-06/06' => true,
            '20150606'   => true,
            '20-06-06'   => true,
            '20/06/06'   => true,
            '20/06-06'   => true,
            '20-06/06'   => true,
            '200606'     => true,
            '2015-00-06' => false,
            '2015-06-32' => false,
            '2015-13-06' => false,
            '0000-06-06' => false,
            '20/16/06'   => false,
            '201606'     => false,
        ),
        'timestamp' => array(
            '2015-05-06 17:15:53' => true,
        ),
        'nullableId' => array(
            '123'  => true,
            'null' => true,
            '0'    => false,
            ''     => false,
            ' '    => false,
        ),
        'nullableValue' => array(
            'abc'   => true,
            '1.23'  => true,
            'null'  => true,
            '0'     => true,
            ''      => false,
            ' '     => false,
        )
    );

    private function processTests($test, $type = 'assertEquals')
    {
        $validate = new \Keyding\Validate;

        foreach ($this->cases[$test] as $input => $assert)
        {
            $input = $input === 'null' ? null : $input;
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
        $this->processTests('timestamp');
    }

    public function testNullableId()
    {
        $this->processTests('nullableId');
    }

    public function testNullableValue()
    {
        $this->processTests('nullableValue');
    }
}
