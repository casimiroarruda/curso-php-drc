<?php
namespace DRC\Report\Service\Money;

use DRC\Report\Service\Money;

class Real extends Money
{
    protected $sign = 'R$';
    protected $isoSign = 'BRL';
    protected $currencyFromDollar = 3.23;
}