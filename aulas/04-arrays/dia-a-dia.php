<?php
//$file = file_get_contents('SacramentocrimeJanuary2006.csv');
//$report = explode("\r",$file);
$report = file('crimes.csv');
$columns = current($report);
$columns = explode(',',$columns);
$columns = array_flip($columns);
$line = next($report);
$summary = [];

while($line){
    $dado = explode(',', $line);
    $info = [];

    foreach($columns as $column => $index){
        $info[trim($column)] = trim($dado[$index]);

    }
    /* tirando um dos tipos de crime
    if($dado[5] === '647(B) PC   PROSTITUTION'){
        $line = next($report);
        continue;
    }*/

    if(!isset($summary[$info['crimedescr']])){
        $summary[$info['crimedescr']] = 0;
    }
    $summary[$info['crimedescr']]++;

    /*
    $summary[$dado[5]] =
        isset($summary[$dado[5]]) ?
            $summary[$dado[5]] + 1 :
            1;*/
    $line = next($report);
}
unset($report);
arsort($summary);
print_r($summary);
