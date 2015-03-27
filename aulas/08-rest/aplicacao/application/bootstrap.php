<?php
require __DIR__ . '/../vendor/autoload.php';

$application = new Silex\Application();
const API_VERSION = 1;
$application->get(
    '/api/' . API_VERSION . '/users/{id}',
    'DRC\Controller\User::get'
);
$application->get(
    '/api/' . API_VERSION . '/users',
    'DRC\Controller\User::findAll'
);
$application->put(
    '/api/' . API_VERSION . '/users',
    'DRC\Controller\User::put'
);
$application->post(
    '/api/' . API_VERSION . '/users/{id}',
    'DRC\Controller\User::post'
);
$application->delete(
    '/api/' . API_VERSION . '/users/{id}',
    'DRC\Controller\User::delete'
);
$application['debug'] = true;
/*$application->post('/api/'.API_VERSION.'/users/{id}',function($id) use ($application){
    return "Editando {$id}";
});
*/
$application->run();