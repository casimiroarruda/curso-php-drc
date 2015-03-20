<?php
<<<<<<< Updated upstream
$array = array(1,2,3);
$array = [
    'A',//0
    'B',//1
    'C' //2
];
echo $array[2],PHP_EOL;

$array[] = 'D';
echo $array[count($array)-1],PHP_EOL;

$array2 = [
  33 => 'Fulano',
    88 => 'Ciclano',
    71 => 'Beltrano'
];
$array2[88] = 'John Doe';
$array2[31] = 'Mary Doe';
$array2[] = 'Foo Bar';
$array3 = [
  'arroz' => 2.69,
  'feijao' => 7.68,
  'leite' => 1.99
];
foreach($array3 as $item => $preco){
    echo "{$item}: R$ {$preco}".PHP_EOL;
}

$array3[] = 5.55;
var_dump($array);
var_dump($array2);
var_dump($array3);

$array4 = [
    'a' => [
        1,2,3
    ],
    'b' => [
        4,5,6
    ],
    'c' => [
        7,8,9
    ]
];
print_r($array4);
echo $array4['c'][1],PHP_EOL;
=======
$array = array();
$arrayNova = [
    'A',
    'B',
    'C'
];

echo $arrayNova[2], PHP_EOL;

$arrayNova[] = 'D';

echo $arrayNova[count($arrayNova)-1],PHP_EOL;
$array2 =[
    33=> 'Fulano',
    88 => 'Ciclano',
    71 => 'Beltrano'
];

$array3 = [
    'arroz' => 2.69,
    'feijao'=> 7.68,
    'leite'=> 1.99
];

var_dump($arrayNova);
var_dump($array2);
var_dump($array3);
>>>>>>> Stashed changes
