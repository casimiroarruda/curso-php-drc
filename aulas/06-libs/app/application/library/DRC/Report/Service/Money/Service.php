<?php

namespace DRC\Report\Service\Money;

use DRC\Report\Service\Money;
use DRC\Report\Service\Registry;

class Service extends Money
{
    public function __construct($isoSign = 'USD')
    {
        $this->setIsoSign($isoSign);
    }

    public function convert($value)
    {
        $container = Registry::get('container');
        $currency = $container['currency'];
        return $currency
            ->convert($value)
            ->from('USD')
            ->to($this->getIsoSign())
            ->format();
    }

    /**
     * @param string $isoSign
     */
    public function setIsoSign($isoSign)
    {
        $this->isoSign = $isoSign;
    }
}