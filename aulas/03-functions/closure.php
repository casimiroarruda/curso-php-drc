<?php

function nomeDaFuncao($parametro1, $parametro2){
    return ($parametro1 + $parametro2) * M_PI;
}

$outraFuncao = function($parametro1, $parametro2 = 8){
    return nomeDaFuncao($parametro1 / $parametro2, rand(5,25));
};

$umaOutraFuncao = function($parametro1, $parametro2 = 7) use ($outraFuncao){
    return $outraFuncao($parametro1 * $parametro2);
};

$resultado = array_map(function($item) use ($umaOutraFuncao){
  return $umaOutraFuncao($item);
},
    [1,2,3]);

var_dump($resultado);
var_dump(ord("\n"));
var_dump(ord("\r"));
var_dump(ord("\t"));
var_dump(ord("\0"));
var_dump(ord("\\"));
var_dump(chr(126));