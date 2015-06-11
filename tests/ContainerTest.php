<?php

namespace Keyding;

class ContainerTest extends \PHPUnit_Framework_TestCase
{
    public function testGet()
    {
        $container = new \Keyding\Container;
        $this->assertInstanceOf('Keyding\Keyword', $container->get('Keyding\Keyword'));
    }
}
