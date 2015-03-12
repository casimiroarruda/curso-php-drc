<?php
// comentario inline
/*
comentario multi linha
*/
/**
  * DocComment / Comentario de documentacao
  * @var $nome string
  */
$nome = 'Anderson';
echo $nome,', Ola Mundo!',PHP_EOL;
const DRC_AULA = 2;
echo DRC_AULA, PHP_EOL;

// Tipos de dados - Escalares
$string = 'Texto';
$string2 = "Texto com variavel - $nome";

echo $string, ' ', $string2, PHP_EOL;

$inteiro = 123;//integer, int
$octal   = 0123;
$hexa    = 0xDA;
echo $inteiro, ' ', $octal, ' ',$hexa,PHP_EOL;

$fracao = 123.42421;// float

$booleano = true;//bool
$falso    = false;

$nulo = null; // null
$a = 'colocado #222';
echo 2 + $a, PHP_EOL;
echo $a, PHP_EOL;// não mudou
