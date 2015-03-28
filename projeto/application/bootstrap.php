<?php
//pedimos gentilmente o autoload
require __DIR__ . '/../vendor/autoload.php';
//configuramos o timezone(fuso) padrão
date_default_timezone_set('America/Sao_Paulo');
//importação do Symfony\...\Request
use Symfony\Component\HttpFoundation\Request;
//obtem configurações de um arquivo ini
$settings = parse_ini_file(__DIR__ . "/configuration/application.ini", true);
//criamos uma classe de configuração, DIC(Dependency Injection Container)
$container = new Pimple;
//atribuimos a configuração ao container
$container['settings'] = $settings;
//configuramos o pdo no container, desta maneira o PDO só será instanciado quando
//$container['pdo'] for chamado
$container['pdo'] = function($c){
    return new PDO(
        $c['settings']['db']['dsn'],
        $c['settings']['db']['username'],
        $c['settings']['db']['password']
    );
};
//instanciamos uma aplicacao silex
$app = new Silex\Application;
//aplicamos o container Pimple na instancia Silex\Application
$app['container'] = $container;
//registramos o twig para uso na rota Silex
$app->register(new Silex\Provider\TwigServiceProvider(), [
    'twig.path' =>  __DIR__.'/templates/'
]);
//depuração ligada
$app['debug']=true;
//ROTAS
//Método HTTP(ROTA, método controlador da rota)
$app->get('/','DRC\ToDo\Controller\Task::listAll');
$app->get('/new','DRC\ToDo\Controller\Task::newTask');
$app->get('/edit/{id}','DRC\ToDo\Controller\Task::saveTask');
$app->put('/api/task','DRC\ToDo\Controller\Task::insert');
$app->post('/api/task','DRC\ToDo\Controller\Task::update');
$app->get('/api/task/{id}/done','DRC\ToDo\Controller\Task::getTaskDone');
//habilita sobrecarga de método http _method='put'
Request::enableHttpMethodParameterOverride();
//executa a aplicação
$app->run();