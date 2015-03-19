<?php

class Money_Dollar extends Money
{
    protected $sign = 'US$';
    protected $isoSign = 'USD';
    protected $currencyFromDollar = 1;
}