<?php
require __DIR__ . '/../vendor/autoload.php';
date_default_timezone_set('America/Sao_Paulo');
use Symfony\Component\HttpFoundation\Request;
$settings = parse_ini_file(__DIR__ . "/configuration/application.ini", true);
$container = new Pimple;
$container['settings'] = $settings;
$container['pdo'] = function($c){
    return new PDO(
        $c['settings']['db']['dsn'],
        $c['settings']['db']['username'],
        $c['settings']['db']['password']
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
$app->get('/new','DRC\ToDo\Controller\Task::newTask');
$app->put('/api/task','DRC\ToDo\Controller\Task::insert');


Request::enableHttpMethodParameterOverride();
$app->run();