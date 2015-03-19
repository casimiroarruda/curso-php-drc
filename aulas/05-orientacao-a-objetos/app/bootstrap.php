<?php
spl_autoload_register(function($className){
    require_once __DIR__."/library/{$className}.php";
    return true;
});

$processor = new DataProcessor(__DIR__ . '/../../04-arrays/sales.csv');
$outputCSV = new CSV;
$currency = new Money_Real();
$report = new Report($processor, $outputCSV,$currency);
echo $report->gerar();