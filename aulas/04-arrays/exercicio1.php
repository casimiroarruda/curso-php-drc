<?php
$listaDeCompras = [
    'arroz' => 2.69,
    'feijao' => 7.68,
    'leite' => 1.99
];
$qtde = [
    'arroz' => 3,
    'feijao' => 5,
    'leite'  =>12
];
function calculaTotal($itens, $quantidade){
    $total = 0;
    foreach($itens as $item => $preco){
        $total += ($preco * $quantidade[$item]);
    }
    return $total;
}
echo calculaTotal($listaDeCompras,$qtde);