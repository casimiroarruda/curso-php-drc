<?php
namespace DRC\ToDo\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class Task
{
    public function listAll(Request $request, Application $app)
    {
        return $app['twig']->render('index.twig', []);
    }
}