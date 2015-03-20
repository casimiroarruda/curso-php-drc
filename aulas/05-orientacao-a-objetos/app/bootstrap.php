<?php
spl_autoload_register(function ($className) {
    $file =__DIR__ . "/library/{$className}.php";
    if(file_exists($file)){
        require_once $file;
        return true;
    }
    return false;
});


$currencies = [
    'BRL' => 'Money_Real',
    'USD' => 'Money_Dollar',
    'EUR' => 'Money_Euro'
];

switch (php_sapi_name()) {
    case 'cli-server':
        $output = new HTML();
        $tmpCurrency = isset($_GET['currency'])? $currencies[$_GET['currency']]:null;
        $tmpSource = isset($_GET['source'])? $_GET['source']:null;
        break;
    default:
        $output = new Shell();
        $tmpCurrency = $_SERVER['argc'] >= 2 ? $currencies[$_SERVER['argv'][1]]:null;
        $tmpSource = $_SERVER['argc'] > 2 ? $_SERVER['argv'][2]:null;
        break;
}

$moneyClass = $tmpCurrency ?:'Money_Dollar';
try{
    $reflector = new ReflectionClass($moneyClass);
} catch (Exception $e){
    echo "O sistema gerou um erro: [".$e->getCode()."] ".$e->getMessage(),PHP_EOL;
    exit;
}

$currency = $reflector->newInstance();

$source = $tmpSource ?:__DIR__.'/../../04-arrays/sales.csv';

$processor = new DataProcessor($source);
$report = new Report($processor, $output, $currency);
echo $report->gerar();