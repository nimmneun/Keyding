<?php

namespace Keyding;

/**
 * @author nimmneun
 * @since 05.06.2015 20:42
 */
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
        return 1 === preg_match('/^([0-9]|[0-1][0-9]|[2][0-3])(:([0-9]|[0-5][0-9])){2}$/' , $value, $m);
    }

    public static function date($value)
    {
        $year = '[1-9][0-9]{3}|[0-9]{2}';
        $month = '[0][1-9]|[1][0-2]';
        $day = '[0][1-9]|[1][0-9]|[2][0-9]|[3][0-1]';
        $sep = '[\/|\-]?';

        return 1 === preg_match('/^('.$year.')('.$sep.')('.$month.')('.$sep.')('.$day.')$/', $value, $m)
            && (count(array_filter($m)) === 4 || count(array_filter($m)) === 6);
    }

    public static function dateSimple($value)
    {
        return 1 === preg_match('/^(\d\d){1,2}([\/\-][\d]{2}){2}$/', $value, $m);
    }

        public static function timestamp($value)
    {
        return 1 === preg_match('/^(\d){4}(-(\d){2}){2} ((\d){2}:){2}(\d){2}$/' , $value, $m);
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

