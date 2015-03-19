<?php

class Report
{
    /**
     * @var DataProcessor
     */
    protected $processor;
    /**
     * @var Printable
     */
    protected $output;

    /**
     * @var Money
     */
    protected $currency;

    /**
     * @return DataProcessor
     */
    public function getProcessor()
    {
        return $this->processor;
    }

    /**
     * @return Printable
     */
    public function getOutput()
    {
        return $this->output;
    }

    /**
     * @return Money
     */
    public function getCurrency()
    {
        return $this->currency;
    }


    public function __construct(DataProcessor $processor, Output $output, Money $currency)
    {
        $this->processor = $processor;
        $this->output = $output;
        $this->currency = $currency;
        $this->output->setReport($this);
    }

    public function gerar()
    {
        return $this->output->show($this->processor);
    }
}