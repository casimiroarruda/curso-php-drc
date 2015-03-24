<?php
/**
 * Created by PhpStorm.
 * User: noite
 * Date: 23/03/15
 * Time: 21:17
 */

namespace DRC\Report\Service;


abstract class Registry
{
    static protected $container = [];

    static public function get($index)
    {

        return self::$container[$index];
    }

    static public function set($index, $value)
    {
        self::$container[$index] = $value;
    }
}