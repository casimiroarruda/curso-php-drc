<?php
//$file = file_get_contents('SacramentocrimeJanuary2006.csv');
//$report = explode("\r",$file);
$report = file('crimes.csv');
$report2 = [];
while($line){
    $report2[] = explode(',', $line);

    /*
    $summary[$dado[5]] =
        isset($summary[$dado[5]]) ?
            $summary[$dado[5]] + 1 :
            1;*/
    $line = next($report);
}
unset($report);
echo (memory_get_usage()/1024);
