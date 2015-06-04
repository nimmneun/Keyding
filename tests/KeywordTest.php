<?php

namespace Keyding;

class KeywordTest extends \PHPUnit_Framework_TestCase
{
    public function testGetId()
    {
        $keyword = new \Keyding\Keyword;
        $this->assertEquals('99', $keyword->getId());
    }

    public function testSetPhrase()
    {
        $keyword = new \Keyding\Keyword;
        $this->assertEquals(\Keyding\Keyword, $keyword->setPhrase('phonky widgets'));
    }
}
