<?php
$variavelComposta = 9;
const XPTO = 123;
$divisao = $variavelComposta / 2;
echo $divisao,PHP_EOL;
$resto = $variavelComposta % 2;
echo $resto, PHP_EOL;
$divisaoInteiro = (int) $divisao;
echo $divisaoInteiro, PHP_EOL;
echo '-----',PHP_EOL;
$a = 1;
$b = $a++;
echo $a,PHP_EOL;
echo $b,PHP_EOL;
echo '-----',PHP_EOL;
$x = ($a == 2) ? 'igual' : 'diferente';
echo $x,PHP_EOL;
echo '-----',PHP_EOL;
// = atribuicao
// == equivalencia
// === igualdade
$i = 1;
$j = 0;
$xx = ($j == false) ? 'igual' : 'diferente';
echo $xx, PHP_EOL;
$xy = ((bool)$i === true) ? 'igual' : 'diferente';
echo $xy, PHP_EOL;
