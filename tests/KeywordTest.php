<?php

namespace Keydings;

class KeywordTest extends \PHPUnit_Framework_TestCase
{
    public function testGetId()
    {
        $keyword = new \Keydings\Keyword;
        $this->assertExquals('99', $keyword->getId());
    }
}
