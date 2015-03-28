<?php
require __DIR__ . '/../vendor/autoload.php';

$settings = parse_ini_file(__DIR__ . "/configuration/application.ini", true);

$container = new Pimple;
$container['settings'] = $settings;
$container['pdo'] = function($c){
    return new PDO(
        $c['settings']['dsn'],
        $c['settings']['username'],
        $c['settings']['password']
    );
};
$app = new Silex\Application;
$app['container'] = $container;
$app->register(new Silex\Provider\TwigServiceProvider(), [
    'twig.path' =>  __DIR__.'/templates/'
]);
$app['debug']=true;
//ROTAS
$app->get('/','DRC\ToDo\Controller\Task::listAll');



$app->run();