<?php
$a1 = [
    'Anderson',
    'Bruno',
    'Marcos',
    'Ricardo',
    'Asdrubal'
];
$a2 = [
    'Anderson' => 10,
    'Bruno' => 0,
    'Asdrubal' => 444,
    'Marcos' => 6546,
    'Ricardo' => 4478
];
/*
print_r($a1);
$a = array_pop($a1);
print_r($a1);
print_r($a);
echo PHP_EOL;
$soma = array_product($a2);
print_r($soma);

echo PHP_EOL;
var_dump(array_search(0,$a2));
echo PHP_EOL;
var_dump(in_array(666,$a2));

var_dump(array_key_exists('Marcos',$a2));
$a2[] = 'askhfashfia';
array_unshift($a2,'Mukeka Braba');
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
var_dump(isset($a2['Ricardo']));
unset($a2['Asdrubal']);
var_dump($a2);

function xpto($item){
    return $item <= 1000;
}
$a3 = array_filter($a2, 'xpto');

var_dump($a2);
var_dump($a3);

*/

print_r($a2);

print_r(array_values($a2));
print_r(array_keys($a2));

print_r(array_reverse($a2));
print_r(array_flip($a2));
$a5 = [1,8,1,8,1,2,8,65,1,8];
print_r(array_unique($a5));

$b = [4,8,1,8,8];
$c = [8,5,9];
print_r(array_intersect($b,$c));
