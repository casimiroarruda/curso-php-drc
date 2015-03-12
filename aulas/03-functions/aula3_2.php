<?php

function boasVindas($nome){
    return "Bem vindo(a) ".$nome.PHP_EOL;
}
function soma($operador1, $operador2){
    return $operador1 + $operador2;
}
$a = soma(1,2);
$b = soma(3,4);
$c = soma($a,$b);
echo $c,PHP_EOL;

function listagem($texto,$vezes){
    for($i = 0; $i < soma($vezes,1); $i++){
        $texto .= ' '.$texto;
    }
    return $texto;
}
echo listagem('Asdrúbal',1);