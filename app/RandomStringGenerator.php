<?php namespace App;

/**
 * Created by PhpStorm.
 * User: eliasib
 * Date: 26/9/16
 * Time: 15:13
 */

class RandomStringGenerator
{
    private static $characters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    private static $numbers = "0123456789";
    private static $symbols = "!@#$%&/=?";

    /**
     * Generates a random string, in order to passed parameters
     *
     * Possible options:
     * - 'numbers'(bool):    Include numbers into result string
     * - 'symbols'(bool):    Include symbols into result string
     * - 'length'(integer):  Result string length
     *
     * @param array $options
     * @return string
     */
    public static function generate(array $options) {
        $baseString = self::$characters;
        $result = '';

        if ($options['numbers']) {
            $baseString .= self::$numbers;
        }
        if ($options['symbols']) {
            $baseString .= self::$symbols;
        }

        for ($i = 0; $i < $options['length']; $i++){
            $result .= $baseString[rand(0, strlen($baseString) - 1)];
        }

        return $result;
    }
}