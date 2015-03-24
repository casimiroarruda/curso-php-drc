<?php
namespace DRC\Report\Service\String;

/**
 * Gerundiando pois é um comportamento
 * trait UnicodeHandling
 * @package DRC\Report\Service\String
 */
trait UnicodeHandling
{
    protected function strPad($input, $pad_length, $pad_string, $pad_style, $encoding = "UTF-8")
    {
        return str_pad($input,
            strlen($input) - mb_strlen($input, $encoding) + $pad_length, $pad_string, $pad_style);
    }
}