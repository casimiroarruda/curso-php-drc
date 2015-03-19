<?php

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