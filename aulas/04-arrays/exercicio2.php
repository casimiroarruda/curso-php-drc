<?php
$csv = [
    [1,'Anderson',33],
    [2,'Bruno',25],
    [3,'Marcos',33],
    [4,'Ricardo',26],
    [5,'Paloma',21],
    [6,'Raquel',18],
    [7,'Nelson',43],
    [8,'Claudia',44],
    [9,'Ivone',58],
    [10,'Marcelo',41]
];
print_r($csv);
$linhas = [];

foreach($csv as $linha) {
    $linhas[] = implode(';',$linha);
}
//print_r($linha);
//print_r($linhas);
$csv = implode(PHP_EOL,$linhas);
echo $csv,PHP_EOL;