<?php
ob_start();
// Localização - l10n *
// Internacionalização - i18n
$locale = 'pt_BR';
//$locale = 'en_US';
setlocale(LC_ALL, $locale);

// $data = file('sales.csv');
//
// $handler = fopen('aksdja');
// while(!feof($handler)){
//   $data = fread($handler, 1024);
// }
// fclose($handler);
$file = file_get_contents('sales.csv');
$data = explode("\r\n",$file);



//array_filter($arrayASerFiltrado, $funcaoDeFiltro): array filtrado
//  $funcaoDeFiltro = function($item){ return (bool) $item(FicaNoArray)? true : false; }
//$a = ['a',false,null,12,0.3,'',0,null,];
// depois do array_filter: $a = ['a',12,0.3];
//array_map($funcaoASerAplicadaACadaItem, $arrayASerPercorrido): array percorrido com a funcao aplicada a cada item
//trim($stringASerLimpa, $caracteresASerRetirados = '\n\r\t\0 '): string limpa
// trim($url, '*-+/') (Unified Resource Locator)
$primeiraLinha = array_shift($data);
$colunas = explode(',', $primeiraLinha);
$colunasLimpas = array_map('trim', $colunas);
$normalizador = function ($item) {
    return trim(strtolower($item));
};
$colunasNormalizadas = array_map($normalizador, $colunasLimpas);
$columnNames = array_filter($colunasNormalizadas);

$data = array_filter($data);
$report = [];
foreach ($data as $line) {
    $celulas = explode(',', $line);
    $celulasLimpas = array_map('trim', $celulas);

    if (12 !== count($celulasLimpas)) {
        continue;
    }

    $celulasLimpas = array_combine($columnNames, $celulasLimpas);
/*
 * $celulasLimpas = Array
(
    [transaction_date] => 1/2/09 6:17
    [product] => Product1
    [price] => 1200
    [payment_type] => Mastercard
    [name] => carolina
    [city] => Basildon
    [state] => England
    [country] => United Kingdom
    [account_created] => 1/2/09 6:00
    [last_login] => 1/2/09 6:08
    [latitude] => 51.5
    [longitude] => -1.1166667
)
 */
    $report[$celulasLimpas['payment_type']] += $celulasLimpas['price'];
}

$report = array_filter($report);
//closure
$formatar['pt_BR'] = function ($item) {
    return 'R$ ' . number_format($item * M_PI, 2, ',', '');// poderiamos usar number_format
    //return money_format('%i', $item);
};
$formatar['en_US'] = function ($item) {
    return 'US$ ' . number_format($item, 2, '.', ',');// poderiamos usar number_format
    //return money_format('%i', $item);
};
//$report = array_map($formatar, $report);
var_dump($report);
//Os Dados estao prontos para o uso

//Exibindo o relatorio
$title = 'Relatório de faturamento / bandeira';
$reportWidth = 40;
$vd = ob_clean();

//Em HTML
$title = 'Relatório de faturamento / bandeira';
$reportWidth = 40;
echo '<html><head><title></title></head><meta charset="utf-8"/>';
echo '<body>';
echo '<table>';
echo PHP_EOL, "<caption>$title</caption>", PHP_EOL;
echo '<tr>', PHP_EOL;
echo "<th>Bandeira</th><th>Faturamento</th>", PHP_EOL;
echo '</tr>', PHP_EOL;
foreach ($report as $bandeira => $valor) {
    echo '<tr>', PHP_EOL;
    echo "<td>$bandeira</td>";
    echo "<td>".$formatar[$locale]($valor)."</td>", PHP_EOL;
    echo '</tr>', PHP_EOL;
}
echo '</table></body></html>';
$html = ob_get_contents();
ob_end_clean();
file_put_contents('report.html',$html);