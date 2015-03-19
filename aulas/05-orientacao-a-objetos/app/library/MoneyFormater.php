<?php

class MoneyFormater
{
    public static function getCurrecy(Money $currency, $value)
    {
        return $currency->convert($value);
    }

}