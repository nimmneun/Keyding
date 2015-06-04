<?php

namespace Keyding;

class Keyword
{
    private $id = 99;
    private $phrase = 'funky widgets';
    private $volume = 9900;
    
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
    
    public function getId()
    {
        return $this->id;
    }

    public function setPhrase($phrase)
    {
        $this->phrase = $phrase;
        return $this;
    }
    
    public function getPhrase()
    {
        return $this->phrase;
    }

    public function setVolume($volume)
    {
        $this->volume = $volume;
        return $this;
    }
    
    public function getVolume()
    {
        return $this->volume;
    }
}
