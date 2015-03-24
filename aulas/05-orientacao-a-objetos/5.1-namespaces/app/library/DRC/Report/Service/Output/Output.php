<?php

namespace DRC\Report\Service\Output;

use DRC\Report\Application\Report;

abstract class Output
{
    /**
     * @var Report
     */
    protected $report;

    public function setReport(Report $report)
    {
        $this->report = $report;
    }

}