<?php

namespace Keyding;

class KeywordTest extends \PHPUnit_Framework_TestCase
{
    public function testGetId()
    {
        $keyword = new \Keyding\Keyword;
        $this->assertExquals('99', $keyword->getId());
    }
}
