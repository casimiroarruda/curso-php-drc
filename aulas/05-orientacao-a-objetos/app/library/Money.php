<?php

abstract class Money
{
    protected $sign = '';
    protected $isoSign = '';
    protected $currencyFromDollar = 0;

    public function convert($value){
        $value *= $this->currencyFromDollar;
        return $this->sign.' '.number_format($value,2,',','');
    }

}