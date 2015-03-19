<?php

class Money_Euro extends Money
{
    protected $sign = '€';
    protected $isoSign = 'EUR';
    protected $currencyFromDollar = .92;
}