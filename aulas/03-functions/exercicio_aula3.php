<?php
$arrozBase = 2.69;
$feijaoBase = 7.68;
$leiteBase = 1.99;

const ORCAMENTO = 75;

function listaDeCompras($arroz, $feijao, $leite)
{
    $totalArroz = $arroz * 3;
    $totalFeijao = $feijao * 5;
    $totalLeite = $leite * 12;
    $total = $totalArroz + $totalFeijao + $totalLeite;
    return $total;
}
function estaDentroDoOrcamento($compras, $orcamento)
{
    return $compras < $orcamento;
}
function mesAMes($arroz, $feijao, $leite, $inflacao = 1){
    $arroz *= $inflacao;
    $feijao *= $inflacao;
    $leite *= $inflacao;

    $totalDasCompras = listaDeCompras($arroz, $feijao, $leite);
    echo "O total de minhas compras foi R$ " . $totalDasCompras . PHP_EOL;

    if (estaDentroDoOrcamento($totalDasCompras, ORCAMENTO)) {
        return "Consegui pagar as compras desse mês!";
    }
    return "Vou ter que fazer hora extra";
}

$meses = [
    'Janeiro' => 1,
    'Fevereiro' => 1.5,
    'Março' => 2.69,
    'Abril' => 3.14
];
foreach($meses as $mes => $inflacao){
    echo '------------------- '.$mes,PHP_EOL;
    echo mesAMes($arrozBase,$feijaoBase,$leiteBase,$inflacao);
    echo PHP_EOL,PHP_EOL;
}