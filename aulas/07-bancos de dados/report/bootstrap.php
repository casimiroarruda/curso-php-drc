<?php
require __DIR__."/../vendor/autoload.php";
$ini = parse_ini_file(__DIR__."/settings/db.ini",true);
$pdo = new PDO($ini['db']['dsn'],$ini['db']['username'],$ini['db']['password']);
$sql = "SELECT id,payment_type as paymentType,amount FROM line";
$statement = $pdo->prepare($sql);

if(!$statement->execute()){
    error_log("Erro: ".print_r($statement->errorInfo(),true));
    exit;
}
$statement->setFetchMode(PDO::FETCH_CLASS,'DRC\Data\Payment');
$report = [];
/**
 * @var \DRC\Data\Payment $each
 */
foreach($statement as $each){
    if(!isset($report[$each->getPaymentType()])){
        $report[$each->getPaymentType()] = 0;
    }
    $report[$each->getPaymentType()] += $each->getAmount();
}
print_r($report);