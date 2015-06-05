<?php

namespace Keyding;

class KeywordTest extends \PHPUnit_Framework_TestCase
{
    public function testGetId()
    {
        $keyword = new \Keyding\Keyword;
        $keyword->setId(123);
        $this->assertEquals('123', $keyword->getId());
    }

    public function testGetPhrase()
    {
        $keyword = new \Keyding\Keyword;
        $keyword->setPhrase('phonky widgets');
        $this->assertEquals('phonky widgets', $keyword->getPhrase());
    }
    public function testGetVolume()
    {
        $keyword = new \Keyding\Keyword;
        $keyword->setVolume(9700);
        $this->assertEquals(9700, $keyword->getVolume());
    }
    
    public function testChain()
    {
        $keyword = new \Keyding\Keyword;
        
        $this->assertEquals('lazy widgets',
            $keyword
            ->setId(321)
            ->setPhrase('lazy widgets')
            ->setVolume(11000)
            ->getPhrase()
        );
    }
}
