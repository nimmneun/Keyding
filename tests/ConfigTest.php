<?php

namespace Keyding;

class ConfigTest extends \PHPUnit_Framework_TestCase
{
    public function testGet()
    {
        $config = new \Keyding\Config;
        $this->assertEquals('root', $config->get('db.neunbox.user'));
        $this->assertEquals('', $config->get('db.neunbox.pass'));
        $this->assertEquals('defaultblubb', $config->get('non.existant.value', 'defaultblubb'));
    }
}
