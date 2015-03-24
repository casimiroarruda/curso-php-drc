<?php
namespace DRC\Report\Service\Money;

use DRC\Report\Service\Money;

class Dollar extends Money
{
    protected $sign = 'US$';
    protected $isoSign = 'USD';
    protected $currencyFromDollar = 1;
}