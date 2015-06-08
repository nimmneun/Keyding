<?php 
/**
 * @author nimmneun
 * @since 02.06.2015 00:26
 */
class Config
{
    private static $instance;

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

//    /**
//     * @param array $args
//     */
//    public function set($args)
//    {
//        // todo: add configs at runtime?
//    }

    public static function getInstance()
    {
        if (null === self::$instance)
        {
            self::$instance = new self;
        }
        return self::$instance;
    }
}
