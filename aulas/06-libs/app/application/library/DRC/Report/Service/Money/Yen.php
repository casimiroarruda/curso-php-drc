<?php
namespace DRC\Report\Service\Money;

use DRC\Report\Service\Money;

class Yen extends Money
{
    protected $sign = '¥';
    protected $isoSign = 'JPY';
    protected $currencyFromDollar = 120.03;
}