<?php
//configuracao de timezone(fuso)
date_default_timezone_set('America/Sao_Paulo');
$string = '1/1/06 11:04';
echo date('w',0);
echo PHP_EOL;
list($date,$time) = explode(' ',$string);
list($mes,$dia,$ano) = explode('/',$date);
list($hora,$minuto) = explode(':',$time);
$timestamp = mktime(
    $hora,
    $minuto,
    0,
    $mes,
    $dia,
    $ano);
echo date('l d/m/Y H:i',$timestamp);