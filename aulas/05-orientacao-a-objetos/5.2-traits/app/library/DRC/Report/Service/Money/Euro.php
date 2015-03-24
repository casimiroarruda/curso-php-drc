<?php
namespace DRC\Report\Service\Money;

use DRC\Report\Service\Money;

class Euro extends Money
{
    protected $sign = '€';
    protected $isoSign = 'EUR';
    protected $currencyFromDollar = .92;
}