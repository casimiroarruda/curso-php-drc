<?php
namespace DRC\Report\Service;

abstract class Money
{
    protected $sign = '';
    protected $isoSign = '';
    protected $currencyFromDollar = 0;

    public function convert($value)
    {
        $value *= $this->currencyFromDollar;
        return $this->sign . ' ' . number_format($value, 2, ',', '');
    }

    /**
     * @return string
     */
    public function getSign()
    {
        return $this->sign;
    }

    /**
     * @return string
     */
    public function getIsoSign()
    {
        return $this->isoSign;
    }

    /**
     * @return int
     */
    public function getCurrencyFromDollar()
    {
        return $this->currencyFromDollar;
    }

}