<?php

namespace Keyding;

class Validate
{
    public static function id($value)
    {
        return 1 === preg_match('/^[1-9][0-9]*$/' , $value, $m);
    }

    public static function num($value)
    {
        return is_numeric($value);
    }

    public static function time($value)
    {
        return self::temporal($value, 'H:i:s');
    }

    public static function date($value)
    {
        return self::temporal($value, 'Y-m-d')
            || self::temporal($value, 'Y/m/d')
            || self::temporal($value, 'Ymd')
            || self::temporal($value, 'y-m-d')
            || self::temporal($value, 'y/m/d')
            || self::temporal($value, 'ymd')
        ;
    }

    public static function timestamp($value)
    {
        return self::temporal($value, 'Y-m-d H:i:s');
    }

    public static function temporal($value, $format)
    {
        $dt = \DateTime::createFromFormat($format, $value);
        return $dt && $dt->format($format) == $value;
    }

    public static function nullableId($value)
    {
        return self::id($value) || is_null($value);
    }

    public static function nullableValue($value)
    {
        return strlen(trim($value)) > 0 || is_null($value);
    }
}

