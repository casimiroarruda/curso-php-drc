<?php
require __DIR__ . "/../vendor/autoload.php";
// importacao dos namespaces
use DRC\Report\Service\Registry;
use Pimple\Container;
//Container Pimple (Injeção de Dependência)
$container = new Container();
//obtenção da variavel dependendo do ambiente para saida e moeda
$tmpCurrency = $_SERVER['argc'] >= 2 ? $_SERVER['argv'][1] : null;
$container['output'] = 'output.default';
if(php_sapi_name() == 'cli-server'){
    $tmpCurrency = isset($_GET['currency']) ? $_GET['currency'] : null;
    $container['output'] = 'output.html';

}
$container['isosign'] = $tmpCurrency?:'USD';
//leitura do ini
$container['ini'] = parse_ini_file(__DIR__.'/settings/report.ini');
//requisição dos containeres
require __DIR__.'/settings/container.php';
// Registro
Registry::set('container',$container);
//app
echo $container['report']->gerar();