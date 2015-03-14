<?php
/**
 * Desafio:
 * Ler sales.csv e montar um relatorio
 *   de faturamento por bandeira (Payment_Type)
 */
setlocale(LC_MONETARY, 'en_US');
$data = file('sales.csv');
$report = [];
$columnNames = array_filter(
    array_map(
        function ($item) {
            return trim(strtolower($item));
        },
        array_map(
            'trim',
            explode(',', array_shift($data))
        )
    )
);
$data = array_filter($data);
foreach ($data as $line) {
    $bit = array_map(
        'trim',
        explode(',', $line)
    );
    if (12 !== count($bit)) {
        continue;
    }
    $bit = array_combine($columnNames, $bit);
    $report[$bit['payment_type']] += $bit['price'];
}
$report = array_filter($report);
$report['DuoCard'] = 2587789.87;
$formatar = function ($item) {
    //number_format($item, 2, ',', '');// poderiamos usar number_format
    return money_format('%n', $item);
};
$report = array_map($formatar, $report);

//Exibindo o relatorio
$title = 'Relatório de faturamento / bandeira';
$reportWidth = 40;
echo PHP_EOL, $title, PHP_EOL;
echo str_repeat('-', $reportWidth), PHP_EOL;
echo '|', str_pad(strtoupper('Bandeira'), 15, ' ', STR_PAD_BOTH);
echo '|', str_pad(strtoupper('Faturamento'), $reportWidth - 15 - 3, ' ', STR_PAD_BOTH), '|', PHP_EOL;
echo str_repeat('-', $reportWidth), PHP_EOL;
foreach ($report as $bandeira => $valor) {
    echo '|', str_pad($bandeira, 15, ' ', STR_PAD_BOTH);
    echo '|', str_pad(" $valor", $reportWidth - 15 - 3, ' '), '|', PHP_EOL;
    echo str_repeat('-', $reportWidth), PHP_EOL;
}

//Em HTML
$title = 'Relatório de faturamento / bandeira';
$reportWidth = 40;
echo '<table>';
echo PHP_EOL, "<caption>$title</caption>", PHP_EOL;
echo '<tr>',PHP_EOL;
echo "<th>Bandeira</th><th>Faturamento</th>", PHP_EOL;
echo '</tr>',PHP_EOL;
foreach ($report as $bandeira => $valor) {
    echo '<tr>',PHP_EOL;
    echo "<td>$bandeira</td>";
    echo "<td>$valor</td>", PHP_EOL;
    echo '</tr>',PHP_EOL;
}
echo '</table>';
