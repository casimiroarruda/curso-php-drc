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