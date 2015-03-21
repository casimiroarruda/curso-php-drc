<?php
require "library/DRC/Report/Service/Autoloader.php";
$loader = new \DRC\Report\Service\Autoloader();
// register the autoloader
$loader->register();
// register the base directories for the namespace prefix
$loader->addNamespace('DRC', "library/DRC");

use DRC\Report\Application\Report;
use DRC\Report\Interaction\DataProcessor;
use DRC\Report\Service\Output\HTML;
use DRC\Report\Service\Output\Shell;

$currencies = [
    'BRL' => 'DRC\Report\Service\Money\Real',
    'USD' => 'DRC\Report\Service\Money\Dollar',
    'EUR' => 'DRC\Report\Service\Money\Euro',
    'JPY' => 'DRC\Report\Service\Money\Yen'
];

switch (php_sapi_name()) {
    case 'cli-server':
        $output = new HTML();
        $tmpCurrency = isset($_GET['currency']) ? $currencies[$_GET['currency']] : null;
        $tmpSource = isset($_GET['source']) ? $_GET['source'] : null;
        break;
    default:
        $output = new Shell();
        $tmpCurrency = $_SERVER['argc'] >= 2 ? $currencies[$_SERVER['argv'][1]] : null;
        $tmpSource = $_SERVER['argc'] > 2 ? $_SERVER['argv'][2] : null;
        break;
}

$moneyClass = $tmpCurrency ?: 'DRC\Report\Service\Money\Dollar';
try {
    $reflector = new ReflectionClass($moneyClass);
} catch (Exception $e) {
    echo "O sistema gerou um erro: [" . $e->getCode() . "] " . $e->getMessage(), PHP_EOL;
    exit;
}

$currency = $reflector->newInstance();

$source = $tmpSource ?: __DIR__ . '/../../../04-arrays/sales.csv';

$processor = new DataProcessor($source);
$report = new Report($processor, $output, $currency);
echo $report->gerar();