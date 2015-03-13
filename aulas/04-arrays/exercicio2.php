<?php
$possivelcsv = [
    [1,'Anderson',33],
    [2,'Bruno',26],
    [3,'Marcos',rand(20,60)],
    [4,'Ricardo',rand(20,60)],
    [5,'Asdrubal',rand(20,60)],
    [6,'Bolodorio',rand(20,60)],
    [7,'Abdao',rand(20,60)],
    [8,'Fulano',rand(20,60)],
    [9,'Beltrano',rand(20,60)],
    [10,'Ciclano',rand(20,60)],
];
print_r($possivelcsv);
$linhas = [];

foreach($possivelcsv as $linha)
{

    $linhas[] = implode(';',$linha);
}
print_r($linha);
print_r($linhas);
$csv = implode(PHP_EOL,$linhas);
echo $csv,PHP_EOL;