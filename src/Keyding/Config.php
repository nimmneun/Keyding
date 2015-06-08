<?php 

namespace Keyding;

class Config
{
    private $data = array(
        'db' => array(
            'neunbox' => array(
                'user' => 'root',
                'pass' => '',
                'dsn'  => 'mysql:dbname=local;host=localhost'
            )
        )
    );

    public function get($var, $default = null)
    {
        $chunks = explode('.', $var);
        $data = $this->data;

        foreach ($chunks as $chunk)
        {
            if (isset($data[$chunk]))
            {
                $data = $data[$chunk];
            }
            else
            {
                $data = $default;
                break;
            }
        }

        return $data;
    }

//    public function set($args)
//    {
//        // todo: add configs at runtime?
//    }

    public static function getConfig($var, $default = null)
    {
        $config = new self;
        return $config->get($var, $default);
    }
}
