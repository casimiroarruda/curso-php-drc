<?php
$colecao = [
    2 => 'Bruno',
    5 => 'Anderson',
    1024 => 'Marcos',
    666 => 'Ricardo'
];
print_r($colecao);
echo current($colecao),PHP_EOL;
echo next($colecao),PHP_EOL;
echo key($colecao),PHP_EOL;
echo current($colecao),PHP_EOL;
echo prev($colecao),PHP_EOL;
echo key($colecao),PHP_EOL;
$colecao2 = $colecao;
sort($colecao2);//ordena pelos valores
ksort($colecao);//ordena pelas chaves
print_r($colecao);
print_r($colecao2);
print_r($return);

//-----------------------
$a2 = [
    'OSX',
    'Windows',
    'Linux',
    'BSD'
];
list($mac,$ms) = $a2;
$a3 = [
    'company' => 'Apple',
    'os' => 'OSX',
    'hardware' => 'Macintosh'
];
extract($a3);
print_r($os);

//-----------------------

$a5 = 'Android,iOS,WindowsPhone,Symbian,Tizen';
$a5 = explode(',' , $a5);
print_r($a5);
$a6 = implode('-',$a2);
print_r($a6);
