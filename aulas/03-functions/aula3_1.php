<?php
$idade = 20;
$idadeMinima = 18;
/*if ($idade > $idadeMinima){
    echo 'puro',PHP_EOL;
} else if ($idade === $idadeMinima) {
    echo 'até que enfim',PHP_EOL;
} else if ($idade === $idadeMinima - 1) {
    echo 'quase lá',PHP_EOL;
}else {
    echo 'impuro',PHP_EOL;
}*/
switch($idade){
    case $idade > $idadeMinima:
        echo 'puro';
        break;
    case $idadeMinima:
        echo 'ate que enfim';
        break;
    case $idadeMinima - 1:
        echo 'quase la';
        break;
    default:
        echo 'impuro';
        break;
}
$capacidade = 51;
$fluxo = 0;
$a && $b && ($c || $e);

$a ^ $b;//XOR
switch(true){
    case $capacidade > 50:
        $fluxo = $fluxo + 50;
        break;
    case (($capacidade > 25) || ($capacidade <=50)):
        $fluxo = $fluxo + 25;
        break;
    case $capacidade <= 25:
        $fluxo = $fluxo + 25;
        break;
}
//echo "Fluxo: ", $fluxo,PHP_EOL;
echo '----------',PHP_EOL;

$colecao = [25,41,33];
for($i = 0,$total = count($colecao); $i < $total; $i++){
    echo $i,': ',$colecao[$i],PHP_EOL;
}
echo $i,PHP_EOL;

print_r($colecao);
while (count($colecao) > 0) {
    $item = array_shift($colecao);
    echo $item,PHP_EOL;
}
print_r($colecao);
echo ' ----- ',PHP_EOL;
$x = 0;
while ($x < 5) {
    $x++;
    echo $x,PHP_EOL;
}

echo ' ----- ',PHP_EOL;
$x = 0;

do{
    $x++;
    echo $x,PHP_EOL;
} while ($x < 5);

$colecao = ['Mac OSX','Windows','Linux'];
foreach($colecao as $item){
    echo $item,PHP_EOL;
}
/*
= atribuição
== equivalência
=== igualdade
!= não equivalência
!== desigualdade
> maior que
>= maior ou igual
< menor que
<= menor ou igual
*/

