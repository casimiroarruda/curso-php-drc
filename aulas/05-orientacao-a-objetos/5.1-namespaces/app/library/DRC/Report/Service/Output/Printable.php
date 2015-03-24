<?php
namespace DRC\Report\Service\Output;

use DRC\Report\Interaction\DataProcessor;

interface Printable
{
    public function show(DataProcessor $processor);
}