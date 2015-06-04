<?php

namespace Keyding;

class KeywordTest extends \PHPUnit_Framework_TestCase
{
    public function testGetId()
    {
        $keyword = new \Keyding\Keyword;
        $this->assertEquals('99', $keyword->getId());
    }

    public function testGetPhrase()
    {
        $keyword = new \Keyding\Keyword;
	$keyword->setPhrase('phonky widgets');
        $this->assertEquals('phonky widgets', $keyword->getPhrase());
    }
}
